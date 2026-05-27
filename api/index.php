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
    putenv('APP_DEBUG=true');
}

require __DIR__ . '/../vendor/autoload.php';

$app = require __DIR__ . '/../bootstrap/app.php';

try {
    $app->handleRequest(\Illuminate\Http\Request::capture());
} catch (\Throwable $e) {
    http_response_code(500);
    header('Content-Type: text/plain');
    echo "Error: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . ":" . $e->getLine() . "\n";
    echo "Trace:\n" . $e->getTraceAsString() . "\n";
}
