<?php

require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

echo "=== Denny Express Comprehensive Setup ===\n\n";

// ============================================================================
// TASK 1: Update Database Categories
// ============================================================================
echo "[1/6] Updating categories...\n";

$newCategories = [
    [
        'name' => 'POS Systems',
        'slug' => 'pos-systems',
        'description' => 'Complete point of sale systems, all-in-one touch terminals, and POS bundles',
        'is_active' => true,
        'sort_order' => 1,
        'children' => [
            ['name' => 'All-in-One Terminals', 'slug' => 'all-in-one-terminals', 'description' => 'Complete POS terminals with integrated touchscreen'],
            ['name' => 'Touch Screens', 'slug' => 'touch-screens', 'description' => 'Touch screen displays for POS'],
            ['name' => 'POS Bundles', 'slug' => 'pos-bundles', 'description' => 'Complete POS system combos with hardware and software'],
        ]
    ],
    [
        'name' => 'POS Hardware',
        'slug' => 'pos-hardware',
        'description' => 'Thermal printers, barcode scanners, cash drawers, and more',
        'is_active' => true,
        'sort_order' => 2,
        'children' => [
            ['name' => 'Thermal Printers', 'slug' => 'thermal-printers', 'description' => 'Receipt and slip printers for POS'],
            ['name' => 'Barcode Scanners', 'slug' => 'barcode-scanners', 'description' => '1D and 2D barcode scanners'],
            ['name' => 'Cash Drawers', 'slug' => 'cash-drawers', 'description' => 'POS cash drawers'],
            ['name' => 'Label Printers', 'slug' => 'label-printers', 'description' => 'Barcode and label printers'],
            ['name' => 'Customer Displays', 'slug' => 'customer-displays', 'description' => 'Customer facing displays'],
            ['name' => 'Scales', 'slug' => 'scales', 'description' => 'Weighing scales with label printing'],
            ['name' => 'Coin Sorters & Counters', 'slug' => 'coin-equipment', 'description' => 'Coin counters and sorters'],
        ]
    ],
    [
        'name' => 'Computers',
        'slug' => 'computers',
        'description' => 'Desktops, all-in-one PCs, and computer accessories',
        'is_active' => true,
        'sort_order' => 3,
        'children' => [
            ['name' => 'Desktops', 'slug' => 'desktops', 'description' => 'Desktop computers'],
            ['name' => 'All-in-One PCs', 'slug' => 'all-in-one-pcs', 'description' => 'All-in-one desktop computers'],
        ]
    ],
    [
        'name' => 'Monitors',
        'slug' => 'monitors',
        'description' => 'Computer monitors and displays',
        'is_active' => true,
        'sort_order' => 4,
        'children' => []
    ],
    [
        'name' => 'Printers',
        'slug' => 'printers',
        'description' => 'Label printers, industrial printers, and accessories',
        'is_active' => true,
        'sort_order' => 5,
        'children' => [
            ['name' => 'Industrial Printers', 'slug' => 'industrial-printers', 'description' => 'Heavy-duty industrial printers'],
            ['name' => 'Label Rewinders', 'slug' => 'label-rewinders', 'description' => 'Label rewinding equipment'],
        ]
    ],
    [
        'name' => 'Packaging & Stickers',
        'slug' => 'packaging-stickers',
        'description' => 'Thermal paper rolls, labels, and packaging supplies',
        'is_active' => true,
        'sort_order' => 6,
        'children' => [
            ['name' => 'Thermal Paper', 'slug' => 'thermal-paper', 'description' => 'Receipt paper rolls'],
            ['name' => 'Labels & Stickers', 'slug' => 'labels-stickers', 'description' => 'Barcode labels and stickers'],
        ]
    ],
    [
        'name' => 'Networking',
        'slug' => 'networking',
        'description' => 'Routers, switches, and cables',
        'is_active' => true,
        'sort_order' => 7,
        'children' => [
            ['name' => 'Cables', 'slug' => 'cables', 'description' => 'Network and power cables'],
        ]
    ],
    [
        'name' => 'POS Software',
        'slug' => 'pos-software',
        'description' => 'Point of sale software solutions',
        'is_active' => true,
        'sort_order' => 8,
        'children' => []
    ],
];

foreach ($newCategories as $catData) {
    $parent = Category::updateOrCreate(
        ['slug' => $catData['slug']],
        [
            'name' => $catData['name'],
            'description' => $catData['description'] ?? null,
            'is_active' => $catData['is_active'],
            'sort_order' => $catData['sort_order'],
            'parent_id' => null,
        ]
    );
    
    echo "  Category: {$parent->name}\n";
    
    foreach ($catData['children'] as $childData) {
        $child = Category::updateOrCreate(
            ['slug' => $childData['slug']],
            [
                'name' => $childData['name'],
                'description' => $childData['description'] ?? null,
                'is_active' => true,
                'parent_id' => $parent->id,
                'sort_order' => 0,
            ]
        );
        echo "    - {$child->name}\n";
    }
}

// ============================================================================
// TASK 2: Update Product Categories
// ============================================================================
echo "\n[2/6] Updating product category assignments...\n";

$categoryMap = [
    'POS Systems' => 'pos-systems',
    'Monitors' => 'monitors',
    'Uncategorized' => 'pos-hardware',
];

$products = Product::all();
foreach ($products as $product) {
    $categorySlug = 'pos-systems';
    
    $name = strtolower($product->name);
    $desc = strtolower($product->description ?? '');
    
    if (str_contains($name, 'monitor')) {
        $categorySlug = 'monitors';
    } elseif (str_contains($name, 'printer') || str_contains($name, 'thermal')) {
        $categorySlug = 'pos-hardware';
    } elseif (str_contains($name, 'scanner')) {
        $categorySlug = 'pos-hardware';
    } elseif (str_contains($name, 'cash drawer')) {
        $categorySlug = 'pos-hardware';
    } elseif (str_contains($name, 'scale') || str_contains($name, 'coin') || str_contains($name, 'money counter')) {
        $categorySlug = 'pos-hardware';
    } elseif (str_contains($name, 'software')) {
        $categorySlug = 'pos-software';
    } elseif (str_contains($name, 'cable')) {
        $categorySlug = 'networking';
    } elseif (str_contains($name, 'desktop') || str_contains($name, 'all-in-one') || str_contains($name, 'combo')) {
        $categorySlug = 'computers';
    }
    
    $category = Category::where('slug', $categorySlug)->first();
    if ($category) {
        // Detach existing and attach new
        $product->categories()->sync([$category->id]);
        echo "  {$product->name} -> {$category->name}\n";
    }
}

// ============================================================================
// TASK 3: Create Settings for WhatsApp, Payment Gateways, Business Info
// ============================================================================
echo "\n[3/6] Creating settings...\n";

$settings = [
    // Business Info
    ['key' => 'business_name', 'value' => 'Denny Express Group', 'group' => 'business'],
    ['key' => 'tagline', 'value' => 'Point of Sale & Computers Johannesburg', 'group' => 'business'],
    ['key' => 'phone_primary', 'value' => '+27 74 355 1336', 'group' => 'business'],
    ['key' => 'phone_secondary', 'value' => '012 023 3315', 'group' => 'business'],
    ['key' => 'email_sales', 'value' => 'sales@dennyexpress.co.za', 'group' => 'business'],
    ['key' => 'email_support', 'value' => 'Support1234@Ecomall.com', 'group' => 'business'],
    ['key' => 'address', 'value' => '187 Alexandra, Halfway House, Midrand, Gauteng, South Africa', 'group' => 'business'],
    
    // WhatsApp
    ['key' => 'whatsapp_enabled', 'value' => '1', 'group' => 'whatsapp'],
    ['key' => 'whatsapp_number', 'value' => '27743551336', 'group' => 'whatsapp'],
    ['key' => 'whatsapp_message', 'value' => 'Hi! I\'m interested in your products. Can you help me?', 'group' => 'whatsapp'],
    
    // PayFast
    ['key' => 'payfast_enabled', 'value' => '1', 'group' => 'payment'],
    ['key' => 'payfast_merchant_id', 'value' => '', 'group' => 'payment'],
    ['key' => 'payfast_merchant_key', 'value' => '', 'group' => 'payment'],
    ['key' => 'payfast_passphrase', 'value' => '', 'group' => 'payment'],
    ['key' => 'payfast_sandbox', 'value' => '1', 'group' => 'payment'],
    
    // Ozow
    ['key' => 'ozow_enabled', 'value' => '1', 'group' => 'payment'],
    ['key' => 'ozow_site_code', 'value' => '', 'group' => 'payment'],
    ['key' => 'ozow_api_key', 'value' => '', 'group' => 'payment'],
    ['key' => 'ozow_private_key', 'value' => '', 'group' => 'payment'],
    
    // PayJustNow
    ['key' => 'payjustnow_enabled', 'value' => '1', 'group' => 'payment'],
    ['key' => 'payjustnow_description', 'value' => 'Pay over 3 EQUAL zero-interest instalments with PayJustNow.', 'group' => 'payment'],
    
    // Shipping
    ['key' => 'free_shipping_threshold', 'value' => '5000', 'group' => 'shipping'],
    ['key' => 'shipping_standard_cost', 'value' => '99', 'group' => 'shipping'],
    ['key' => 'warranty_months', 'value' => '18', 'group' => 'general'],
];

foreach ($settings as $setting) {
    Setting::updateOrCreate(
        ['key' => $setting['key']],
        ['value' => $setting['value'], 'group' => $setting['group']]
    );
    echo "  Setting: {$setting['key']}\n";
}

// ============================================================================
// TASK 4: Add product image URLs using WordPress patterns
// ============================================================================
echo "\n[4/6] Adding product image placeholders...\n";

$imagePatterns = [
    'pos system' => 'https://dennyexpress.co.za/wp-content/uploads/2026/02/POINT-OF-SALE-SYSTEM.jpg',
    'combo' => 'https://dennyexpress.co.za/wp-content/uploads/2026/02/POINT-OF-SALE-SYSTEM.jpg',
    'terminal' => 'https://dennyexpress.co.za/wp-content/uploads/2026/02/POINT-OF-SALE-SYSTEM.jpg',
    'printer' => 'https://placehold.co/400x400/f3f4f6/059669?text=Thermal+Printer',
    'scanner' => 'https://placehold.co/400x400/f3f4f6/f97316?text=Barcode+Scanner',
    'cash drawer' => 'https://placehold.co/400x400/f3f4f6/059669?text=Cash+Drawer',
    'scale' => 'https://placehold.co/400x400/f3f4f6/059669?text=Weighing+Scale',
    'monitor' => 'https://placehold.co/400x400/f3f4f6/059669?text=Monitor',
    'coin' => 'https://placehold.co/400x400/f3f4f6/f97316?text=Coin+Counter',
    'money counter' => 'https://placehold.co/400x400/f3f4f6/f97316?text=Money+Counter',
    'cable' => 'https://placehold.co/400x400/f3f4f6/059669?text=Network+Cable',
    'software' => 'https://placehold.co/400x400/f3f4f6/059669?text=POS+Software',
    'keyboard' => 'https://placehold.co/400x400/f3f4f6/f97316?text=Keyboard',
    'godex' => 'https://placehold.co/400x400/f3f4f6/059669?text=Label+Printer',
    'fujitsu' => 'https://dennyexpress.co.za/wp-content/uploads/2026/02/POINT-OF-SALE-SYSTEM.jpg',
    'elo' => 'https://dennyexpress.co.za/wp-content/uploads/2026/02/POINT-OF-SALE-SYSTEM.jpg',
    'hp' => 'https://dennyexpress.co.za/wp-content/uploads/2026/02/POINT-OF-SALE-SYSTEM.jpg',
    'hisense' => 'https://dennyexpress.co.za/wp-content/uploads/2026/02/POINT-OF-SALE-SYSTEM.jpg',
];

$products = Product::all();
foreach ($products as $product) {
    $existing = ProductImage::where('product_id', $product->id)->where('is_primary', true)->first();
    if ($existing) {
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
        'image_url' => $imageUrl,
        'alt_text' => $product->name,
        'is_primary' => true,
        'sort_order' => 1,
    ]);
    
    echo "  {$product->name} -> Image set\n";
}

// ============================================================================
// Save logo and client logos locally
// ============================================================================
echo "\n[5/6] Saving logos locally...\n";

$logosDir = public_path('images/logos');
$clientsDir = public_path('images/clients');

if (!is_dir($logosDir)) {
    mkdir($logosDir, 0755, true);
}
if (!is_dir($clientsDir)) {
    mkdir($clientsDir, 0755, true);
}

// Download logo
$logoUrl = 'https://dennyexpress.co.za/wp-content/uploads/2025/05/denny-logo.webp';
$logoPath = $logosDir . '/denny-logo.webp';
if (!file_exists($logoPath)) {
    $logoContent = @file_get_contents($logoUrl);
    if ($logoContent) {
        file_put_contents($logoPath, $logoContent);
        echo "  Logo downloaded: denny-logo.webp\n";
    }
}

// Client logos from the website
$clientLogos = [
    'puma' => 'https://dennyexpress.co.za/wp-content/uploads/2026/02/puma.webp',
    'pure-water' => 'https://dennyexpress.co.za/wp-content/uploads/2026/02/PureWater5-04RcOQZDkdjdzoPm6uWyWA.png',
    'miss-moo' => 'https://dennyexpress.co.za/wp-content/uploads/2026/02/miss-moo-nail-1.jpg',
    'bling-girl' => 'https://dennyexpress.co.za/wp-content/uploads/2026/02/bling-girl-official_logo.jpg',
    'kwazionke' => 'https://dennyexpress.co.za/wp-content/uploads/2026/02/kwazionke.png',
    'unnamed' => 'https://dennyexpress.co.za/wp-content/uploads/2026/02/unnamed.png',
];

foreach ($clientLogos as $name => $url) {
    $ext = pathinfo(parse_url($url, PHP_URL_PATH), PATHINFO_EXTENSION) ?: 'png';
    $savePath = $clientsDir . '/' . $name . '.' . $ext;
    
    if (!file_exists($savePath)) {
        $content = @file_get_contents($url);
        if ($content) {
            file_put_contents($savePath, $content);
            echo "  Client logo: {$name}.{$ext}\n";
        }
    }
}

echo "\n[6/6] Complete!\n\n";
echo "=== Setup Summary ===\n";
echo "Categories created/updated: " . Category::count() . "\n";
echo "Products updated: " . Product::count() . "\n";
echo "Settings created/updated: " . count($settings) . "\n";
echo "========================\n";
