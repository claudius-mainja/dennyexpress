<?php

require_once 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Product;
use App\Models\ProductImage;

$products = Product::with('primaryImage')->get();
$total = $products->count();
$hasReal = 0;
$hasFallback = 0;

echo "=== Product Image Status ===\n\n";

foreach ($products as $p) {
    $img = $p->primaryImage;
    if ($img) {
        $path = $img->path;
        if (str_contains($path, 'pos-system-fallback') || str_contains($path, 'pos-system-main')) {
            $hasFallback++;
            echo "[FALLBACK] ";
        } else {
            $hasReal++;
            echo "[REAL]     ";
        }
        echo "ID: $p->id, Slug: $p->slug\n  Image: $path\n  Source: $p->original_source_url\n\n";
    } else {
        $hasFallback++;
        echo "[NO IMAGE] ID: $p->id, Slug: $p->slug\n  Source: $p->original_source_url\n\n";
    }
}

echo "\n=== Summary ===\n";
echo "Total: $total\n";
echo "Real images: $hasReal\n";
echo "Fallback/no image: $hasFallback\n";
