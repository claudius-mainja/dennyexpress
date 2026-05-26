<?php

require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;

echo "=== Downloading Product Images ===\n\n";

$productsDir = public_path('images/products');
if (!is_dir($productsDir)) {
    mkdir($productsDir, 0755, true);
}

$mainImageUrl = 'https://dennyexpress.co.za/wp-content/uploads/2026/02/POINT-OF-SALE-SYSTEM.jpg';
$localMainPath = $productsDir . '/pos-system-main.jpg';

if (!file_exists($localMainPath)) {
    echo "Downloading main POS system image...\n";
    $content = @file_get_contents($mainImageUrl);
    if ($content) {
        file_put_contents($localMainPath, $content);
        echo "  Saved: images/products/pos-system-main.jpg\n";
    }
}

$products = Product::with('primaryImage')->get();
$updated = 0;
$skipped = 0;

$imagePatterns = [
    'pos system' => 'pos-system',
    'combo' => 'pos-combo',
    'terminal' => 'pos-terminal',
    'touch screen' => 'pos-touch',
    'printer' => 'thermal-printer',
    'thermal' => 'thermal-printer',
    'xprinter' => 'thermal-printer',
    'epson' => 'thermal-printer',
    'godex' => 'label-printer',
    'scanner' => 'barcode-scanner',
    'barcode' => 'barcode-scanner',
    'handsfree' => 'barcode-scanner',
    'laser' => 'barcode-scanner',
    'cash drawer' => 'cash-drawer',
    'flip top' => 'cash-drawer',
    'scale' => 'weighing-scale',
    'butcher' => 'weighing-scale',
    'coin' => 'coin-counter',
    'money counter' => 'money-counter',
    'sorter' => 'coin-sorter',
    'avansa' => 'coin-counter',
    'snowrex' => 'coin-scale',
    'counterfeit' => 'money-counter',
    'monitor' => 'monitor',
    'cable' => 'network-cable',
    'cat5' => 'network-cable',
    'software' => 'pos-software',
    'tavern' => 'pos-software',
    'restaurant' => 'pos-software',
    'keyboard' => 'keyboard-combo',
    'mouse' => 'keyboard-combo',
    'payjustnow' => 'pos-system',
    'elo' => 'pos-touch',
    'hisense' => 'pos-terminal',
    'hp' => 'pos-system',
    'fujitsu' => 'pos-system',
    'dell' => 'pos-system',
    'core i5' => 'pos-system',
    'optiplex' => 'pos-system',
    'speed point' => 'pos-system',
];

$placeholderColors = [
    'pos-system' => ['bg' => '059669', 'text' => 'ffffff'],
    'pos-combo' => ['bg' => '059669', 'text' => 'ffffff'],
    'pos-terminal' => ['bg' => '059669', 'text' => 'ffffff'],
    'pos-touch' => ['bg' => '059669', 'text' => 'ffffff'],
    'thermal-printer' => ['bg' => '065f46', 'text' => 'ffffff'],
    'label-printer' => ['bg' => '065f46', 'text' => 'ffffff'],
    'barcode-scanner' => ['bg' => 'f97316', 'text' => 'ffffff'],
    'cash-drawer' => ['bg' => '059669', 'text' => 'ffffff'],
    'weighing-scale' => ['bg' => '059669', 'text' => 'ffffff'],
    'coin-counter' => ['bg' => 'f97316', 'text' => 'ffffff'],
    'money-counter' => ['bg' => 'f97316', 'text' => 'ffffff'],
    'coin-sorter' => ['bg' => 'f97316', 'text' => 'ffffff'],
    'coin-scale' => ['bg' => 'f97316', 'text' => 'ffffff'],
    'monitor' => ['bg' => '059669', 'text' => 'ffffff'],
    'network-cable' => ['bg' => '059669', 'text' => 'ffffff'],
    'pos-software' => ['bg' => '059669', 'text' => 'ffffff'],
    'keyboard-combo' => ['bg' => 'f97316', 'text' => 'ffffff'],
];

foreach ($products as $product) {
    $name = strtolower($product->name);
    $type = 'pos-system';
    
    foreach ($imagePatterns as $pattern => $t) {
        if (str_contains($name, $pattern)) {
            $type = $t;
            break;
        }
    }
    
    $existingImage = $product->primaryImage;
    
    $useLocalMain = in_array($type, ['pos-system', 'pos-combo', 'pos-terminal', 'pos-touch']);
    
    if ($useLocalMain && file_exists($localMainPath)) {
        $newPath = 'images/products/pos-system-main.jpg';
        
        if ($existingImage && $existingImage->path === $newPath) {
            $skipped++;
            continue;
        }
        
        if ($existingImage) {
            $existingImage->update(['path' => $newPath]);
        } else {
            ProductImage::create([
                'product_id' => $product->id,
                'path' => $newPath,
                'alt_text' => $product->name,
                'is_primary' => true,
                'sort_order' => 1,
            ]);
        }
        $updated++;
        echo "  [{$updated}] {$product->name} -> Local image\n";
    } else {
        $colors = $placeholderColors[$type] ?? ['bg' => '059669', 'text' => 'ffffff'];
        $readableType = ucwords(str_replace('-', ' ', $type));
        $placeholderUrl = "https://placehold.co/600x600/{$colors['bg']}/{$colors['text']}?text=" . urlencode($readableType);
        
        if ($existingImage && $existingImage->path === $placeholderUrl) {
            $skipped++;
            continue;
        }
        
        if ($existingImage) {
            $existingImage->update(['path' => $placeholderUrl]);
        } else {
            ProductImage::create([
                'product_id' => $product->id,
                'path' => $placeholderUrl,
                'alt_text' => $product->name,
                'is_primary' => true,
                'sort_order' => 1,
            ]);
        }
        $updated++;
        echo "  [{$updated}] {$product->name} -> {$type}\n";
    }
}

echo "\n=== Summary ===\n";
echo "Products updated: {$updated}\n";
echo "Products skipped (already up-to-date): {$skipped}\n";
echo "Local main image: " . (file_exists($localMainPath) ? "Yes (images/products/pos-system-main.jpg)" : "No") . "\n";
