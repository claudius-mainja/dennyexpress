<?php

require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Product;
use App\Models\ProductImage;

echo "=== Adding Product Images ===\n\n";

$imagePatterns = [
    'pos system' => 'https://dennyexpress.co.za/wp-content/uploads/2026/02/POINT-OF-SALE-SYSTEM.jpg',
    'combo' => 'https://dennyexpress.co.za/wp-content/uploads/2026/02/POINT-OF-SALE-SYSTEM.jpg',
    'terminal' => 'https://dennyexpress.co.za/wp-content/uploads/2026/02/POINT-OF-SALE-SYSTEM.jpg',
    'touch screen' => 'https://dennyexpress.co.za/wp-content/uploads/2026/02/POINT-OF-SALE-SYSTEM.jpg',
    'elo' => 'https://dennyexpress.co.za/wp-content/uploads/2026/02/POINT-OF-SALE-SYSTEM.jpg',
    'hisense' => 'https://dennyexpress.co.za/wp-content/uploads/2026/02/POINT-OF-SALE-SYSTEM.jpg',
    'hp' => 'https://dennyexpress.co.za/wp-content/uploads/2026/02/POINT-OF-SALE-SYSTEM.jpg',
    'fujitsu' => 'https://dennyexpress.co.za/wp-content/uploads/2026/02/POINT-OF-SALE-SYSTEM.jpg',
    'dell' => 'https://dennyexpress.co.za/wp-content/uploads/2026/02/POINT-OF-SALE-SYSTEM.jpg',
    'core i5' => 'https://dennyexpress.co.za/wp-content/uploads/2026/02/POINT-OF-SALE-SYSTEM.jpg',
    'optiplex' => 'https://dennyexpress.co.za/wp-content/uploads/2026/02/POINT-OF-SALE-SYSTEM.jpg',
    'speed point' => 'https://dennyexpress.co.za/wp-content/uploads/2026/02/POINT-OF-SALE-SYSTEM.jpg',
    'printer' => 'https://placehold.co/400x400/f3f4f6/059669?text=Thermal+Printer',
    'thermal' => 'https://placehold.co/400x400/f3f4f6/059669?text=Thermal+Printer',
    'xprinter' => 'https://placehold.co/400x400/f3f4f6/059669?text=Thermal+Printer',
    'epson' => 'https://placehold.co/400x400/f3f4f6/059669?text=Thermal+Printer',
    'godex' => 'https://placehold.co/400x400/f3f4f6/059669?text=Label+Printer',
    'label rewinder' => 'https://placehold.co/400x400/f3f4f6/059669?text=Label+Rewinder',
    'scanner' => 'https://placehold.co/400x400/f3f4f6/f97316?text=Barcode+Scanner',
    'barcode' => 'https://placehold.co/400x400/f3f4f6/f97316?text=Barcode+Scanner',
    'handsfree' => 'https://placehold.co/400x400/f3f4f6/f97316?text=Barcode+Scanner',
    'laser' => 'https://placehold.co/400x400/f3f4f6/f97316?text=Barcode+Scanner',
    'cash drawer' => 'https://placehold.co/400x400/f3f4f6/059669?text=Cash+Drawer',
    'flip top' => 'https://placehold.co/400x400/f3f4f6/059669?text=Cash+Drawer',
    'scale' => 'https://placehold.co/400x400/f3f4f6/059669?text=Weighing+Scale',
    'butcher' => 'https://placehold.co/400x400/f3f4f6/059669?text=Weighing+Scale',
    'coin' => 'https://placehold.co/400x400/f3f4f6/f97316?text=Coin+Counter',
    'money counter' => 'https://placehold.co/400x400/f3f4f6/f97316?text=Money+Counter',
    'sorter' => 'https://placehold.co/400x400/f3f4f6/f97316?text=Coin+Sorter',
    'avansa' => 'https://placehold.co/400x400/f3f4f6/f97316?text=Coin+Counter',
    'snowrex' => 'https://placehold.co/400x400/f3f4f6/f97316?text=Coin+Scale',
    'counterfeit' => 'https://placehold.co/400x400/f3f4f6/f97316?text=Money+Counter',
    'monitor' => 'https://placehold.co/400x400/f3f4f6/059669?text=Monitor',
    'cable' => 'https://placehold.co/400x400/f3f4f6/059669?text=Network+Cable',
    'cat5' => 'https://placehold.co/400x400/f3f4f6/059669?text=Network+Cable',
    'software' => 'https://placehold.co/400x400/f3f4f6/059669?text=POS+Software',
    'tavern' => 'https://placehold.co/400x400/f3f4f6/059669?text=POS+Software',
    'restaurant' => 'https://placehold.co/400x400/f3f4f6/059669?text=POS+Software',
    'keyboard' => 'https://placehold.co/400x400/f3f4f6/f97316?text=Keyboard+Combo',
    'mouse' => 'https://placehold.co/400x400/f3f4f6/f97316?text=Keyboard+Combo',
    'payjustnow' => 'https://dennyexpress.co.za/wp-content/uploads/2026/02/POINT-OF-SALE-SYSTEM.jpg',
];

$products = Product::all();
$count = 0;
$skipped = 0;

foreach ($products as $product) {
    $existing = ProductImage::where('product_id', $product->id)->where('is_primary', true)->first();
    if ($existing) {
        $skipped++;
        continue;
    }
    
    $name = strtolower($product->name);
    $imageUrl = 'https://dennyexpress.co.za/wp-content/uploads/2026/02/POINT-OF-SALE-SYSTEM.jpg';
    
    foreach ($imagePatterns as $pattern => $url) {
        if (str_contains($name, $pattern)) {
            $imageUrl = $url;
            break;
        }
    }
    
    ProductImage::create([
        'product_id' => $product->id,
        'path' => $imageUrl,
        'alt_text' => $product->name,
        'is_primary' => true,
        'sort_order' => 1,
    ]);
    
    $count++;
    echo "  [{$count}] {$product->name}\n    -> {$imageUrl}\n";
}

echo "\n=== Done ===\n";
echo "Added: {$count} images\n";
echo "Skipped (already exist): {$skipped}\n";
