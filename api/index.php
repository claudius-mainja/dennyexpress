<?php

define('LARAVEL_START', microtime(true));

if (isset($_ENV['VERCEL_ENV']) || isset($_SERVER['VERCEL'])) {
    if (!empty($_ENV['POSTGRES_URL'])) {
        $url = parse_url($_ENV['POSTGRES_URL']);
        $pgHost = $url['host'] ?? '';
        $pgPort = $url['port'] ?? '5432';
        $pgDb = ltrim($url['path'] ?? '', '/');
        $pgUser = $url['user'] ?? '';
        $pgPass = $url['pass'] ?? '';

        putenv("DB_CONNECTION=pgsql");
        putenv("DB_HOST=$pgHost");
        putenv("DB_PORT=$pgPort");
        putenv("DB_DATABASE=$pgDb");
        putenv("DB_USERNAME=$pgUser");
        putenv("DB_PASSWORD=$pgPass");
        putenv("DB_SSLMODE=require");
    }

    putenv('APP_CONFIG_CACHE=/tmp/config.php');
    putenv('APP_EVENTS_CACHE=/tmp/events.php');
    putenv('APP_ROUTES_CACHE=/tmp/routes.php');
    putenv('VIEW_COMPILED_PATH=/tmp/views');
    putenv('COMPOSER_VENDOR_DIR=/tmp/vendor');
}

require __DIR__ . '/../public/index.php';
