<?php

define('LARAVEL_START', microtime(true));

if (isset($_ENV['VERCEL_ENV'])) {
    putenv('APP_CONFIG_CACHE=/tmp/config.php');
    putenv('APP_EVENTS_CACHE=/tmp/events.php');
    putenv('APP_ROUTES_CACHE=/tmp/routes.php');
    putenv('VIEW_COMPILED_PATH=/tmp/views');
    putenv('COMPOSER_VENDOR_DIR=/tmp/vendor');
    putenv('LOG_CHANNEL=stderr');
    putenv('SESSION_DRIVER=array');
    putenv('CACHE_STORE=database');
    putenv('QUEUE_CONNECTION=database');
}

require __DIR__ . '/../vendor/autoload.php';

$app = require __DIR__ . '/../bootstrap/app.php';

$app->handleRequest(\Illuminate\Http\Request::capture());
