<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $jsonPath = base_path() . DIRECTORY_SEPARATOR . 'extracted_data' . DIRECTORY_SEPARATOR . 'dennyexpress_data.json';
        
        if (!File::exists($jsonPath)) {
            $this->command->error("JSON file not found: $jsonPath");
            return;
        }
        
        $jsonContent = File::get($jsonPath);
        $json = json_decode($jsonContent, true);
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->command->error("JSON decode error: " . json_last_error_msg());
            return;
        }
        
        if (!isset($json['products'])) {
            $this->command->error("No 'products' key in JSON");
            return;
        }
        
        $products = $json['products'];
        $this->command->info("Found " . count($products) . " products to import");

        $categoryBySlug = Category::pluck('id', 'slug')->toArray();

        $productCategorySlugs = [
            20386 => 'single-station-combos',
            20388 => 'barcode-scales',
            19451 => 'pos-systems',
            19342 => 'pos-systems',
            19336 => 'pos-systems',
            19297 => 'pos-systems',
            19261 => 'receipt-printers',
            19258 => 'multi-station-combos',
            19253 => 'single-station-combos',
            19232 => 'speed-point-devices',
            19163 => 'barcode-scanners',
            19148 => 'label-printers',
            19144 => 'accessories',
            19141 => 'label-printers',
            19137 => 'label-printers',
            19132 => 'barcode-scanners',
            19123 => 'label-printers',
            18995 => 'receipt-printers',
            18982 => 'money-counters-sorters',
            18979 => 'money-counters-sorters',
            18974 => 'money-counters-sorters',
            18972 => 'money-counters-sorters',
            18968 => 'money-counters-sorters',
            18966 => 'money-counters-sorters',
            18963 => 'cash-drawers',
            19661 => 'accessories',
            19660 => 'multi-station-combos',
            18955 => 'multi-station-combos',
            18953 => 'multi-station-combos',
            18943 => 'multi-station-combos',
            18938 => 'pos-software',
            18932 => 'pos-software',
            18930 => 'computers-laptops',
            18868 => 'pos-systems',
            18866 => 'accessories',
            18861 => 'barcode-scanners',
            18860 => 'cash-drawers',
            18859 => 'receipt-printers',
            18855 => 'receipt-printers',
            16655 => 'single-station-combos',
            1076 => 'pos-systems',
            16635 => 'computers-laptops',
            85 => 'pos-systems',
            16644 => 'label-printers',
        ];

        $specsMap = [
            20388 => [
                ['label' => 'Capacity', 'value' => '30kg'],
                ['label' => 'Power Supply', 'value' => '220V/50Hz'],
                ['label' => 'Division', 'value' => '10g'],
                ['label' => 'Dimensions', 'value' => '40 x 45 x 20cm'],
                ['label' => 'Weight', 'value' => '7.2kg'],
                ['label' => 'Type', 'value' => 'Thermal Label Printing Scale'],
            ],
            20386 => [
                ['label' => 'Processor', 'value' => 'Intel Core i5-4210U'],
                ['label' => 'RAM', 'value' => '4GB DDR3'],
                ['label' => 'Storage', 'value' => '128GB SSD'],
                ['label' => 'Touch Screen', 'value' => '15.6 inch'],
                ['label' => 'Printer', 'value' => '80mm Thermal Receipt/Slip Printer'],
                ['label' => 'Cash Drawer', 'value' => 'RJ11/12 Kick Cash Drawer'],
                ['label' => 'Scanner', 'value' => 'USB Barcode Scanner'],
                ['label' => 'Software', 'value' => 'Free POS Software Included'],
            ],
            19451 => [
                ['label' => 'Processor', 'value' => 'Intel Core i5-2400S'],
                ['label' => 'RAM', 'value' => '8GB DDR3'],
                ['label' => 'Storage', 'value' => '120GB SSD'],
                ['label' => 'Operating System', 'value' => 'Windows 10 Pro'],
                ['label' => 'Touch Screen', 'value' => '15 inch Touch Terminal'],
                ['label' => 'Printer', 'value' => 'Epson Thermal Slip Printer'],
                ['label' => 'Scanner', 'value' => '1D-2D USB Barcode Scanner'],
                ['label' => 'Condition', 'value' => 'Certified Refurbished'],
            ],
            19342 => [
                ['label' => 'Processor', 'value' => 'Core i3 7th Generation'],
                ['label' => 'RAM', 'value' => '8GB'],
                ['label' => 'Storage', 'value' => '256GB SSD'],
                ['label' => 'Clock Speed', 'value' => '3.0 GHz'],
                ['label' => 'Customer Display', 'value' => 'Included'],
            ],
            19336 => [
                ['label' => 'Processor', 'value' => 'Core i3'],
                ['label' => 'RAM', 'value' => '8GB'],
                ['label' => 'Type', 'value' => 'Refurbished All-in-One Touchscreen'],
                ['label' => 'Condition', 'value' => 'Refurbished'],
            ],
            19297 => [
                ['label' => 'Model', 'value' => 'Hisense HI-HK718B'],
                ['label' => 'Type', 'value' => 'All-in-One Touch Screen'],
                ['label' => 'Form Factor', 'value' => '5-in-1 Combo Full Set'],
            ],
            19261 => [
                ['label' => 'Interface', 'value' => 'USB'],
                ['label' => 'Printing Width', 'value' => '56mm'],
                ['label' => 'Paper Width', 'value' => '20-60mm'],
                ['label' => 'Resolution', 'value' => '203 DPI'],
                ['label' => 'Print Speed', 'value' => '152mm/s'],
                ['label' => 'Cutter', 'value' => 'Automatic Cutter'],
            ],
            19148 => [
                ['label' => 'Model', 'value' => 'GoDEX ZX420i'],
                ['label' => 'Resolution', 'value' => '203 dpi'],
                ['label' => 'Print Speed', 'value' => 'Up to 6 inches/second'],
                ['label' => 'Ribbon Capacity', 'value' => '450 meters'],
                ['label' => 'Label Capacity', 'value' => '8 inches'],
                ['label' => 'Interfaces', 'value' => 'USB 2.0, USB Host, Serial, Parallel, Ethernet'],
                ['label' => 'Wireless', 'value' => 'Optional WiFi and Bluetooth'],
                ['label' => 'Type', 'value' => 'Thermal Transfer Industrial Printer'],
            ],
            19144 => [
                ['label' => 'Model', 'value' => 'GoDEX EA10681P-240'],
                ['label' => 'Width', 'value' => '4 inches'],
                ['label' => 'Power', 'value' => '60W'],
                ['label' => 'Type', 'value' => 'Label Rewinder with Idler Arm'],
            ],
            19141 => [
                ['label' => 'Model', 'value' => 'GoDEX DT4x'],
                ['label' => 'Resolution', 'value' => '203 dpi'],
                ['label' => 'Print Speed', 'value' => '7 IPS'],
                ['label' => 'Interfaces', 'value' => 'USB 2.0, Serial, Ethernet'],
                ['label' => 'Language Emulations', 'value' => 'EZPL, GEPL, GZPL'],
                ['label' => 'Type', 'value' => 'Direct Thermal Desktop Printer'],
            ],
            19137 => [
                ['label' => 'Model', 'value' => 'GoDEX DT2x'],
                ['label' => 'Resolution', 'value' => '203 dpi'],
                ['label' => 'Print Speed', 'value' => '7 inches/second'],
                ['label' => 'Interfaces', 'value' => 'Ethernet, Serial, USB'],
                ['label' => 'Type', 'value' => 'Direct Thermal Desktop Printer (Ultralight)'],
            ],
            19132 => [
                ['label' => 'Model', 'value' => 'Brother QL-700'],
                ['label' => 'Dimensions', 'value' => '5.04 x 8.7 x 6.02 cm'],
                ['label' => 'Weight', 'value' => '1.1 kg'],
                ['label' => 'Type', 'value' => 'Label Printer / Scanner'],
            ],
            19123 => [
                ['label' => 'Model', 'value' => 'GoDEX DT2'],
                ['label' => 'Print Width', 'value' => '2.5 inches'],
                ['label' => 'Mounting', 'value' => 'Space-saving, Wall-mounted'],
                ['label' => 'Interfaces', 'value' => 'USB 2.0, Serial, Ethernet'],
                ['label' => 'Language Emulations', 'value' => 'EZPL, GEPL, GZPL'],
                ['label' => 'Type', 'value' => 'Direct Thermal Printer'],
            ],
            18995 => [
                ['label' => 'Model', 'value' => 'XP-P810'],
                ['label' => 'Material', 'value' => 'ABS'],
                ['label' => 'Connectivity', 'value' => 'Bluetooth, WiFi'],
                ['label' => 'Power', 'value' => 'Power Bank / Computer USB'],
                ['label' => 'Print Type', 'value' => 'Direct Thermal'],
                ['label' => 'Type', 'value' => 'Mini Mobile Receipt Printer'],
            ],
            18982 => [
                ['label' => 'Counting Speed', 'value' => '900+ bills per minute'],
                ['label' => 'Hopper Capacity', 'value' => '300 bills'],
                ['label' => 'Detection', 'value' => 'UV and Magnetic Counterfeit Detection'],
            ],
            18979 => [
                ['label' => 'Display', 'value' => 'LCD, 5 digits'],
                ['label' => 'Calibration', 'value' => 'Auto Calibration'],
                ['label' => 'Design', 'value' => 'Compact with High Precision Load Cell'],
                ['label' => 'Type', 'value' => 'Coin Counting Scale'],
            ],
            18974 => [
                ['label' => 'Model', 'value' => 'AVANSA CoinMate 1200'],
                ['label' => 'Trays', 'value' => '9 coin sorting trays'],
                ['label' => 'Type', 'value' => 'Coin Counter and Sorter'],
            ],
            18972 => [
                ['label' => 'Model', 'value' => 'Adam Equipment CCSA 20'],
                ['label' => 'Preset Values', 'value' => '9 coin presets, 3 token values'],
                ['label' => 'Memory', 'value' => 'Memory total function'],
                ['label' => 'Type', 'value' => 'Coin Counting Scale'],
            ],
            18968 => [
                ['label' => 'Hopper Capacity', 'value' => '300-500 pieces'],
                ['label' => 'Counting Speed', 'value' => '330 coins/minute'],
                ['label' => 'Interface', 'value' => 'RS232 Serial Port for Thermal Printer'],
                ['label' => 'Type', 'value' => 'Automatic Coin Sorter'],
            ],
            18966 => [
                ['label' => 'Counting Speed', 'value' => '270 coins per minute'],
                ['label' => 'Receiving Slots', 'value' => '8 slots'],
                ['label' => 'Hopper Capacity', 'value' => '350-400 units'],
                ['label' => 'Functions', 'value' => 'Sorting, Counting, Batching'],
                ['label' => 'Type', 'value' => 'Automatic Coin Sorter'],
            ],
            18963 => [
                ['label' => 'Compartments', 'value' => '8 coin slots, 6 note slots'],
                ['label' => 'Security', 'value' => 'Lockable'],
                ['label' => 'Interface', 'value' => 'RJ11 Connector'],
                ['label' => 'Voltage', 'value' => '12V'],
                ['label' => 'Material', 'value' => 'Stainless Steel Top, Black Base'],
                ['label' => 'Type', 'value' => 'Flip-top Cash Drawer'],
            ],
            18860 => [
                ['label' => 'Compartments', 'value' => '5 Note slots, 4 Coin slots'],
                ['label' => 'Interface', 'value' => 'RJ11 / RJ12 Printer Kick Interface'],
                ['label' => 'Voltage', 'value' => '24V'],
                ['label' => 'Features', 'value' => 'Micro Switch, Removable Tray'],
                ['label' => 'Type', 'value' => 'Cash Drawer'],
            ],
            18861 => [
                ['label' => 'Model', 'value' => 'YHD-8200'],
                ['label' => 'Connectivity', 'value' => 'Wired USB'],
                ['label' => 'Type', 'value' => 'Handheld Laser Barcode Scanner'],
                ['label' => 'Colour', 'value' => 'Black'],
            ],
            18859 => [
                ['label' => 'Model', 'value' => 'Epson TM-T88IV / TM-T88V Series'],
                ['label' => 'Interface', 'value' => 'Ethernet'],
                ['label' => 'Features', 'value' => 'Paper Reduction Function'],
                ['label' => 'Type', 'value' => 'Thermal Receipt Printer'],
                ['label' => 'Condition', 'value' => 'New'],
            ],
            18855 => [
                ['label' => 'Print Width', 'value' => '80mm'],
                ['label' => 'Interface', 'value' => 'USB'],
                ['label' => 'Type', 'value' => 'Thermal Printer'],
            ],
            16644 => [
                ['label' => 'Resolution', 'value' => '203 DPI'],
                ['label' => 'Print Speed', 'value' => '127 mm/s'],
                ['label' => 'Print Width', 'value' => '108 mm'],
                ['label' => 'Interfaces', 'value' => 'USB 2.0, Ethernet'],
                ['label' => 'Software', 'value' => 'Bartender Software Included'],
                ['label' => 'Type', 'value' => 'Direct Thermal Barcode Printer'],
            ],
            16635 => [
                ['label' => 'Model', 'value' => 'Dell OptiPlex 3050'],
                ['label' => 'Processor', 'value' => 'Intel Core i5 6th Gen'],
                ['label' => 'RAM', 'value' => '8GB'],
                ['label' => 'Storage', 'value' => '240GB SSD'],
                ['label' => 'Operating System', 'value' => 'Windows 10 Pro'],
                ['label' => 'Monitor', 'value' => '15 inch'],
                ['label' => 'Warranty', 'value' => '1 Year'],
                ['label' => 'Condition', 'value' => 'Certified Refurbished'],
            ],
            85 => [
                ['label' => 'RAM', 'value' => '4GB'],
                ['label' => 'Operating System', 'value' => 'Windows 10'],
                ['label' => 'Storage', 'value' => '64GB SSD'],
                ['label' => 'Screen', 'value' => 'Touch Screen'],
                ['label' => 'Software', 'value' => 'Free POS Software Included'],
                ['label' => 'Type', 'value' => 'All-in-One POS'],
                ['label' => 'Condition', 'value' => 'New'],
            ],
            1076 => [
                ['label' => 'Model', 'value' => 'HP RP7800'],
                ['label' => 'RAM', 'value' => '4GB'],
                ['label' => 'Storage', 'value' => '128GB SSD'],
                ['label' => 'Type', 'value' => 'All-in-One POS Bundle'],
                ['label' => 'Condition', 'value' => 'Refurbished'],
            ],
            18930 => [
                ['label' => 'Size', 'value' => '22 inch'],
                ['label' => 'Condition', 'value' => 'Refurbished'],
                ['label' => 'Type', 'value' => 'LED Computer Monitor'],
            ],
        ];

        $whatIncludedMap = [
            20386 => [
                '15.6 inch Touch Point of Sale Terminal',
                '80mm Thermal Receipt/Slip Printer',
                'RJ11/12 Kick Cash Drawer',
                'USB Barcode Scanner',
                'Free POS Software',
                'Power Cables & Accessories',
            ],
            19451 => [
                'Refurbished HP RP7800 Touch Screen (Core i5, 8GB, 120GB SSD)',
                '15 inch Touch Terminal',
                'POS Cash Drawer',
                'Epson Thermal Slip Printer',
                '1D-2D USB Barcode Scanner',
                'Pre-installed Windows 10 Pro',
            ],
            19342 => [
                'POS Terminal with Customer Display',
                'Cash Drawer',
                'Barcode Scanner',
                'Thermal Printer',
                'Keyboard',
                'Mouse',
                'Free POS Software',
            ],
            19336 => [
                'Refurbished All-in-One Touchscreen (Core i3, 8GB)',
                'New Cash Drawer',
                'New Keyboard',
                'New Barcode Scanner',
                'New Thermal Printer',
                'Free POS Software',
            ],
            19297 => [
                'Hisense HI-HK718B All-in-One Touch Screen',
                'Cash Drawer',
                'Barcode Scanner',
                'Thermal Paper Rolls',
            ],
            19258 => [
                '2 x Refurbished All-in-One Touch Screens',
                '2 x New Cash Drawers',
                '2 x New Thermal Printers',
                '2 x New Barcode Scanners',
                '2 x New Keyboards',
                '2 x New Mouse',
                '1 x Refurbished Monitor',
                '1 x Refurbished Core i5 Back Office Computer',
                'Installation and Setup',
                'Training',
                'Transport Included',
            ],
            19253 => [
                '15 inch Touch Terminal (Certified Refurbished)',
                'POS Cash Drawer',
                'Thermal Receipt Printer',
                'Barcode Scanner',
                'Free POS Software (No Monthly Charges)',
                'Free Delivery',
            ],
            19232 => [
                'DennyPos PrintPOS Card Machine',
                'Free Back Up Snap and Pay QR Code Sign',
                'Charger',
                'User Guide',
                'Card Acceptance Display Decal',
                'Tally Rolls',
            ],
            19660 => [
                '2 x Refurbished Touch Screens',
                '2 x New Cash Drawers',
                '2 x New Printers',
                '2 x New Barcode Scanners',
                '2 x Keyboard + Mouse',
                '1 x UPS 1KW',
                '1 x Monitor',
                '1 x Core i5 Back Office Computer',
                'Training & Transport Included',
            ],
            18955 => [
                '3 x Refurbished Touch Screens',
                '3 x New Cash Drawers',
                '3 x New Thermal Printers',
                '3 x New Barcode Scanners',
                '3 x Keyboard + Mouse',
                '1 x Monitor',
                '1 x Core i5 Back Office Computer',
                'Once-off POS Software License',
            ],
            18953 => [
                '3 x Refurbished Touch Screens',
                '3 x New Cash Drawers',
                '3 x New Printers',
                '3 x New Barcode Scanners',
                '3 x Keyboard + Mouse',
                '1 x Monitor',
                '1 x Core i5 Back Office Computer',
                'Once-off POS Software License',
            ],
            18943 => [
                '2 x Refurbished Touch Screens',
                '2 x New Cash Drawers',
                '2 x New Printers',
                '2 x New Barcode Scanners',
                '2 x Keyboard + Mouse',
                '1 x Monitor',
                '1 x Core i5 Back Office Computer',
            ],
            18938 => [
                'POS Software License (Once-off Purchase)',
                'Free Training',
                'Free Support',
            ],
            18932 => [
                'POS Software License',
                'Free Training',
                'Free Support',
            ],
            16655 => [
                'POS Terminal (Certified Refurbished)',
                'New Cash Drawer',
                'New Keyboard',
                'New Barcode Scanner',
                'New Thermal Printer',
                'Free POS Software (No Monthly Charges)',
                'Free Delivery',
            ],
            1076 => [
                'Refurbished HP RP7800 Touch Screen (4GB RAM, 128GB SSD)',
                'New Cash Drawer',
                'New Barcode Scanner',
                'New Thermal Printer',
                'New Keyboard',
                'New Mouse',
                'Free POS Software',
                'Free Training',
            ],
            18868 => [
                'Refurbished All-in-One Touchscreen',
                'New Cash Drawer',
                'New Keyboard',
                'New Barcode Scanner',
                'New Thermal Printer',
                'Free POS Software',
            ],
        ];

        $skuMap = [
            16655 => '0051',
            1076 => '0040',
            16635 => '0014',
            85 => '0084',
            16644 => '0036',
            18995 => 'XP-P810',
        ];

        $importedCount = 0;
        foreach ($products as $productData) {
            $id = $productData['id'];
            $description = $productData['description'] ?? '';

            $stockStatus = 'in_stock';
            $stockQuantity = null;
            $rawStock = $productData['stock_status'] ?? 'In stock';
            if (preg_match('/In stock \((\d+) available\)/i', (string)$rawStock, $m)) {
                $stockStatus = 'in_stock';
                $stockQuantity = (int)$m[1];
            } elseif (str_starts_with(strtolower((string)$rawStock), 'in stock')) {
                $stockStatus = 'in_stock';
            } else {
                $stockStatus = 'out_of_stock';
                $stockQuantity = 0;
            }

            $sku = $skuMap[$id] ?? null;
            if (!$sku && preg_match('/SKU:\s*(\S+)/', (string)$description, $m)) {
                $sku = $m[1];
            }

            $price = $productData['price'] ?? 0;
            $onSale = $productData['on_sale'] ?? false;
            $discountPercentage = $productData['discount_percentage'] ?? null;
            $salePrice = null;
            if ($onSale && isset($productData['original_price'])) {
                $salePrice = $productData['original_price'];
            }

            $product = Product::create([
                'name' => $productData['name'],
                'slug' => $productData['slug'],
                'sku' => $sku,
                'description' => $description,
                'short_description' => mb_substr($description, 0, 200),
                'price' => $price,
                'sale_price' => $salePrice,
                'discount_percentage' => $discountPercentage,
                'stock_status' => $stockStatus,
                'stock_quantity' => $stockQuantity,
                'on_sale' => $onSale,
                'is_active' => true,
                'warranty_months' => 18,
                'delivery_estimate_days_min' => 14,
                'delivery_estimate_days_max' => 30,
                'specifications' => isset($specsMap[$id]) ? array_values($specsMap[$id]) : null,
                'what_included' => $whatIncludedMap[$id] ?? null,
                'original_source_url' => $productData['url'] ?? null,
                'original_source_id' => (string)$id,
            ]);

            if (isset($productCategorySlugs[$id])) {
                $slug = $productCategorySlugs[$id];
                if (isset($categoryBySlug[$slug])) {
                    $product->categories()->attach($categoryBySlug[$slug]);
                }
            }
            $importedCount++;
        }
        
        $this->command->info("Imported $importedCount products");
    }
}
