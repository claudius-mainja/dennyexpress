<?php
require __DIR__ . '/vendor/autoload.php';

$app = require __DIR__ . '/bootstrap/app.php';
$app->bootstrapWith([
    'Illuminate\Foundation\Bootstrap\LoadEnvironmentVariables',
    'Illuminate\Foundation\Bootstrap\LoadConfiguration',
    'Illuminate\Foundation\Bootstrap\HandleExceptions',
    'Illuminate\Foundation\Bootstrap\RegisterFacades',
    'Illuminate\Foundation\Bootstrap\SetRequestForConsole',
    'Illuminate\Foundation\Bootstrap\RegisterProviders',
    'Illuminate\Foundation\Bootstrap\BootProviders',
]);

// Simulate a guest session
$sessionId = 'test-session-' . uniqid();
session_id($sessionId);
session_start();

// Manually set cart session id
$_SESSION['cart_session_id'] = $sessionId;

// Get CartService
$cartService = app(\App\Services\CartService::class);

// Instead of using Session facade, inject our session ID manually
$ref = new ReflectionClass($cartService);
$sessionKeyProp = $ref->getProperty('sessionKey');
$sessionKeyProp->setAccessible(true);
$sessionKey = $sessionKeyProp->getValue($cartService);

// Set session data manually
// Our session has cart_session_id = $sessionId
// Now getCart() should find/create a cart with session_id = $sessionId
$cart = $cartService->getCart();
echo "Cart ID: " . $cart->id . "\n";
echo "Cart session_id: " . $cart->session_id . "\n";

// Try adding a product
try {
    $product = \App\Models\Product::first();
    if ($product) {
        $item = $cartService->add($product->id, 1);
        echo "Added item: " . $item->id . "\n";
        
        $count = $cartService->count();
        echo "Cart count: " . $count . "\n";
        
        $toArray = $cartService->toArray();
        echo "toArray count: " . $toArray['count'] . "\n";
    } else {
        echo "No products found in database\n";
    }
} catch (\Throwable $e) {
    echo "Error: " . $e->getMessage() . "\n";
    echo $e->getTraceAsString() . "\n";
}
