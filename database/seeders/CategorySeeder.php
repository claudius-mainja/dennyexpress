<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'POS Systems',
                'slug' => 'pos-systems',
                'description' => 'Complete point of sale systems including all-in-one touch terminals, POS combos, and standalone POS hardware for retail, tavern, restaurant, and bottle store businesses.',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Combos & Bundles',
                'slug' => 'combos-bundles',
                'description' => 'Money-saving POS combos and bundles that include everything you need to get started — touch screens, printers, scanners, cash drawers, and software.',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Receipt Printers',
                'slug' => 'receipt-printers',
                'description' => 'Thermal receipt printers for POS systems including desktop and mobile options from Epson, Xprinter, and more.',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Barcode Scanners',
                'slug' => 'barcode-scanners',
                'description' => '1D and 2D barcode scanners for POS systems, inventory management, and retail operations.',
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'Label Printers',
                'slug' => 'label-printers',
                'description' => 'Direct thermal and thermal transfer label printers for barcode labels, shipping labels, and product tagging from GoDEX, Xprinter, and more.',
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'name' => 'Barcode Scales',
                'slug' => 'barcode-scales',
                'description' => 'Electronic barcode label printing scales for butchery, bakery, fruit and veg, and deli counter weighing and pricing.',
                'is_active' => true,
                'sort_order' => 6,
            ],
            [
                'name' => 'Cash Drawers',
                'slug' => 'cash-drawers',
                'description' => 'Lockable cash drawers with note and coin compartments, RJ11/RJ12 printer kick interface, and 12V/24V options.',
                'is_active' => true,
                'sort_order' => 7,
            ],
            [
                'name' => 'Money Counters & Sorters',
                'slug' => 'money-counters-sorters',
                'description' => 'Banknote counters with counterfeit detection, coin sorters and counters, and coin counting scales for efficient cash handling.',
                'is_active' => true,
                'sort_order' => 8,
            ],
            [
                'name' => 'Speed Point Devices',
                'slug' => 'speed-point-devices',
                'description' => 'Card payment machines and speed point devices for accepting debit and credit card payments in-store or on-the-go.',
                'is_active' => true,
                'sort_order' => 9,
            ],
            [
                'name' => 'POS Software',
                'slug' => 'pos-software',
                'description' => 'Point of sale software for taverns, restaurants, retail stores, and bottle stores. Once-off purchase or subscription options with free training.',
                'is_active' => true,
                'sort_order' => 10,
            ],
            [
                'name' => 'Computers & Laptops',
                'slug' => 'computers-laptops',
                'description' => 'Desktop computers, all-in-one PCs, monitors, and laptops — certified refurbished with warranty for your business and back office needs.',
                'is_active' => true,
                'sort_order' => 11,
            ],
            [
                'name' => 'Accessories',
                'slug' => 'accessories',
                'description' => 'POS accessories including keyboards, mice, cables, label rewinders, and other essential peripherals.',
                'is_active' => true,
                'sort_order' => 12,
            ],
            [
                'name' => 'Thermal Paper & Supplies',
                'slug' => 'thermal-paper-supplies',
                'description' => 'Thermal paper rolls for receipt printers, barcode labels, ribbons, and other POS consumables.',
                'is_active' => true,
                'sort_order' => 13,
            ],
            [
                'name' => 'Stock Taking',
                'slug' => 'stock-taking',
                'description' => 'Stock taking hardware and software solutions for inventory management and asset tracking.',
                'is_active' => true,
                'sort_order' => 14,
            ],
        ];

        $createdCategories = [];
        foreach ($categories as $data) {
            $category = Category::create($data);
            $createdCategories[$data['slug']] = $category;
        }

        $combosBundles = $createdCategories['combos-bundles'];

        $subcategories = [
            [
                'name' => 'Single Station Combos',
                'slug' => 'single-station-combos',
                'description' => 'Single station POS combos ideal for small retail stores, taverns, and bottle stores with one checkout point.',
                'parent_id' => $combosBundles->id,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Multi Station Combos',
                'slug' => 'multi-station-combos',
                'description' => 'Multi-station POS bundles with 2-5 touch screens for larger stores, restaurants, and businesses with multiple checkout points.',
                'parent_id' => $combosBundles->id,
                'is_active' => true,
                'sort_order' => 2,
            ],
        ];

        foreach ($subcategories as $data) {
            Category::create($data);
        }
    }
}
