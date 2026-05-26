<?php

require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Setting;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use App\Services\PayFastService;
use App\Services\OzowService;

echo "=== Final Status Check ===\n\n";

echo "[1] Settings Test:\n";
echo "  PayFast sandbox: " . Setting::get('payfast_sandbox', 'N/A') . "\n";
echo "  WhatsApp enabled: " . Setting::get('whatsapp_enabled', 'N/A') . "\n";
echo "  WhatsApp number: " . Setting::get('whatsapp_number', 'N/A') . "\n";
echo "  Total settings: " . Setting::count() . "\n\n";

echo "[2] Products:\n";
echo "  Total products: " . Product::count() . "\n";
echo "  Products with images: " . Product::has('primaryImage')->count() . "\n\n";

echo "[3] Categories:\n";
echo "  Total categories: " . Category::count() . "\n";
$parents = Category::whereNull('parent_id')->get();
foreach ($parents as $p) {
    $childCount = Category::where('parent_id', $p->id)->count();
    echo "  - {$p->name} ($childCount children)\n";
}
echo "\n";

echo "[4] Local Files:\n";
echo "  Main product image: " . (file_exists(public_path('images/products/pos-system-main.jpg')) ? "Yes" : "No") . "\n";
echo "  Logo: " . (file_exists(public_path('images/logos/denny-logo.webp')) ? "Yes" : "No") . "\n";
echo "  Client logos: " . (is_dir(public_path('images/clients')) ? count(scandir(public_path('images/clients'))) - 2 : 0) . "\n\n";

echo "[5] Payment Services:\n";
$payfast = new PayFastService();
echo "  PayFast enabled: " . ($payfast->isEnabled() ? "Yes" : "No") . "\n";
echo "  PayFast URL: " . $payfast->getPaymentUrl() . "\n";

$ozow = new OzowService();
echo "  Ozow enabled: " . ($ozow->isEnabled() ? "Yes" : "No") . "\n\n";

echo "=== Ready! ===\n";
echo "Server: http://127.0.0.1:8000\n";
