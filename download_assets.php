<?php

require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Product;
use App\Models\ProductImage;

echo "=== Downloading Assets & Fixing Categories ===\n\n";

$logosDir = public_path('images/logos');
$clientsDir = public_path('images/clients');
$productsDir = public_path('images/products');

foreach ([$logosDir, $clientsDir, $productsDir] as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

function downloadFile($url, $savePath) {
    if (file_exists($savePath)) {
        return true;
    }
    
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36');
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    
    $content = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if ($httpCode === 200 && $content) {
        file_put_contents($savePath, $content);
        return true;
    }
    
    return false;
}

echo "[1/4] Downloading Denny Express logo...\n";
$logoUrl = 'https://dennyexpress.co.za/wp-content/uploads/2025/05/denny-logo.webp';
if (downloadFile($logoUrl, $logosDir . '/denny-logo.webp')) {
    echo "  Saved: images/logos/denny-logo.webp\n";
}

$logoPngUrl = 'https://dennyexpress.co.za/wp-content/uploads/2025/05/cropped-denny-1-32x32.png';
if (downloadFile($logoPngUrl, $logosDir . '/favicon.png')) {
    echo "  Saved: images/logos/favicon.png\n";
}

echo "\n[2/4] Downloading client logos...\n";
$clientLogos = [
    ['url' => 'https://dennyexpress.co.za/wp-content/uploads/2026/02/puma.webp', 'name' => 'puma'],
    ['url' => 'https://dennyexpress.co.za/wp-content/uploads/2026/02/PureWater5-04RcOQZDkdjdzoPm6uWyWA.png', 'name' => 'purewater'],
    ['url' => 'https://dennyexpress.co.za/wp-content/uploads/2026/02/miss-moo-nail-1.jpg', 'name' => 'missmoo'],
    ['url' => 'https://dennyexpress.co.za/wp-content/uploads/2026/02/bling-girl-official_logo.jpg', 'name' => 'blinggirl'],
    ['url' => 'https://dennyexpress.co.za/wp-content/uploads/2026/02/kwazionke.png', 'name' => 'kwazionke'],
    ['url' => 'https://dennyexpress.co.za/wp-content/uploads/2026/02/unnamed.png', 'name' => 'ecomall'],
];

foreach ($clientLogos as $logo) {
    $ext = pathinfo(parse_url($logo['url'], PHP_URL_PATH), PATHINFO_EXTENSION) ?: 'png';
    $savePath = $clientsDir . '/' . $logo['name'] . '.' . $ext;
    
    if (downloadFile($logo['url'], $savePath)) {
        echo "  Saved: images/clients/{$logo['name']}.{$ext}\n";
    } else {
        echo "  Failed: {$logo['name']}\n";
    }
}

echo "\n[3/4] Fixing product image patterns...\n";

$products = Product::all();
$fixedCount = 0;

foreach ($products as $product) {
    $name = strtolower($product->name);
    $newType = null;
    
    if (str_contains($name, 'cash drawer')) {
        $newType = 'cash-drawer';
    }
    
    if ($newType) {
        $image = $product->primaryImage;
        if ($image && !str_contains($image->path ?? '', $newType)) {
            $placeholderUrl = "https://placehold.co/600x600/059669/ffffff?text=Cash+Drawer";
            $image->update(['path' => $placeholderUrl]);
            echo "  Fixed: {$product->name} -> cash-drawer\n";
            $fixedCount++;
        }
    }
}

echo "  Fixed: {$fixedCount} products\n";

echo "\n[4/4] Updating settings with local logo paths...\n";

use App\Models\Setting;

Setting::updateOrCreate(
    ['key' => 'logo_path'],
    ['value' => 'images/logos/denny-logo.webp', 'group' => 'business']
);

echo "  Logo path setting updated\n";

echo "\n=== Done ===\n";
