#!/bin/bash
set -euo pipefail

# ===============================================================
# Denny Express — Production Deployment Script
# Run this on the Hostinger VPS after cloning the repo.
# Usage: bash deploy/deploy.sh
# ===============================================================

APP_DIR="/var/www/dennyexpress"
DOMAIN="dennyexpress.co.za"

echo "=== Denny Express Deployment ==="
echo "Target: $APP_DIR"
echo "Domain: $DOMAIN"
echo ""

# 1. System prerequisites
echo ">>> Installing system dependencies..."
sudo apt update && sudo apt upgrade -y
sudo apt install -y \
    nginx \
    php8.3-fpm php8.3-cli php8.3-mysql php8.3-xml php8.3-mbstring \
    php8.3-curl php8.3-gd php8.3-zip php8.3-bcmath php8.3-intl \
    composer \
    supervisor \
    certbot python3-certbot-nginx \
    git unzip curl

# 2. Clone / pull the repository
if [ -d "$APP_DIR" ]; then
    echo ">>> Updating existing installation..."
    cd "$APP_DIR"
    sudo -u www-data git pull origin main
else
    echo ">>> Cloning repository..."
    sudo mkdir -p "$APP_DIR"
    sudo chown www-data:www-data "$APP_DIR"
    sudo -u www-data git clone <REPO_URL> "$APP_DIR"
    cd "$APP_DIR"
fi

# 3. Install PHP dependencies
echo ">>> Installing Composer dependencies..."
cd "$APP_DIR"
sudo -u www-data composer install --no-dev --optimize-autoloader

# 4. Install Node dependencies & build assets
echo ">>> Building frontend assets..."
sudo -u www-data npm ci --production
sudo -u www-data npm run build

# 5. Environment setup
echo ">>> Setting up .env..."
if [ ! -f "$APP_DIR/.env" ]; then
    sudo -u www-data cp "$APP_DIR/.env.production" "$APP_DIR/.env"
    echo "!!! IMPORTANT: Edit $APP_DIR/.env and set:"
    echo "    - DB_DATABASE, DB_USERNAME, DB_PASSWORD (from Hostinger)"
    echo "    - MAIL_PASSWORD (if using SMTP)"
    echo "    - APP_KEY will be generated next"
    read -p "Press Enter after editing .env..."
else
    echo ".env already exists, skipping."
fi

# 6. Generate app key
echo ">>> Generating app key..."
cd "$APP_DIR"
sudo -u www-data php artisan key:generate --force

# 7. Storage setup
echo ">>> Setting up storage..."
cd "$APP_DIR"
sudo -u www-data php artisan storage:link --force
sudo chmod -R 775 storage bootstrap/cache
sudo chown -R www-data:www-data storage bootstrap/cache

# 8. Run migrations & seeders
echo ">>> Running database migrations..."
cd "$APP_DIR"
sudo -u www-data php artisan migrate --seed --force

# 9. Create admin user
echo ">>> Creating admin user..."
cd "$APP_DIR"
sudo -u www-data php artisan make:admin

# 10. Cache Laravel config
echo ">>> Caching..."
cd "$APP_DIR"
sudo -u www-data php artisan config:cache
sudo -u www-data php artisan route:cache
sudo -u www-data php artisan view:cache
sudo -u www-data php artisan event:cache

# 11. Nginx configuration
echo ">>> Setting up Nginx..."
sudo cp "$APP_DIR/deploy/nginx.conf" /etc/nginx/sites-available/$DOMAIN
sudo ln -sf /etc/nginx/sites-available/$DOMAIN /etc/nginx/sites-enabled/
sudo rm -f /etc/nginx/sites-enabled/default
sudo nginx -t
sudo systemctl reload nginx

# 12. SSL certificate
echo ">>> Obtaining SSL certificate..."
sudo certbot --nginx -d $DOMAIN -d www.$DOMAIN --non-interactive --agree-tos -m sales@dennyexpress.co.za

# 13. Supervisor (queue worker)
echo ">>> Setting up Supervisor..."
sudo cp "$APP_DIR/deploy/supervisor-dennyexpress.conf" /etc/supervisor/conf.d/dennyexpress-worker.conf
sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl start dennyexpress-worker:* || true

# 14. Schedule cron
echo ">>> Setting up cron for scheduler..."
(crontab -l 2>/dev/null; echo "* * * * * cd $APP_DIR && sudo -u www-data php artisan schedule:run >> /dev/null 2>&1") | crontab -

# 15. Post-deployment
echo ">>> Optimizing..."
cd "$APP_DIR"
sudo -u www-data php artisan optimize

echo ""
echo "=== Deployment Complete! ==="
echo "Visit: https://$DOMAIN"
echo "Admin: https://$DOMAIN/admin"
echo ""
echo "Next steps:"
echo "  1. Verify the site loads at https://$DOMAIN"
echo "  2. Log into /admin with the admin credentials you just created"
echo "  3. Check that payment gateways show in Admin > Payments"
echo "  4. Run a test order through checkout"
echo "  5. Monitor queue: sudo supervisorctl tail -f dennyexpress-worker:*
