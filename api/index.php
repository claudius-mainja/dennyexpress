<?php

use Illuminate\Http\Request;

defined('LARAVEL_START') || define('LARAVEL_START', microtime(true));

// If PHP is running on Vercel
if (isset($_ENV['VERCEL_ENV'])) {
    // Map Vercel Postgres env vars to Laravel's expected names
    if (!empty($_ENV['POSTGRES_URL'])) {
        $url = parse_url($_ENV['POSTGRES_URL']);
        $_ENV['DB_CONNECTION'] = 'pgsql';
        $_ENV['DB_HOST'] = $url['host'] ?? '';
        $_ENV['DB_PORT'] = $url['port'] ?? '5432';
        $_ENV['DB_DATABASE'] = ltrim($url['path'] ?? '', '/');
        $_ENV['DB_USERNAME'] = $url['user'] ?? '';
        $_ENV['DB_PASSWORD'] = $url['pass'] ?? '';
        $_ENV['DB_SSLMODE'] = 'require';
    }

    // Use /tmp for writable paths
    $_ENV['APP_CONFIG_CACHE'] = '/tmp/config.php';
    $_ENV['APP_EVENTS_CACHE'] = '/tmp/events.php';
    $_ENV['APP_ROUTES_CACHE'] = '/tmp/routes.php';
    $_ENV['VIEW_COMPILED_PATH'] = '/tmp/views';
    $_ENV['COMPOSER_VENDOR_DIR'] = '/tmp/vendor';
}

if (file_exists(__DIR__ . '/../public/index.php')) {
    require __DIR__ . '/../public/index.php';
    return;
}

$app = require __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);
