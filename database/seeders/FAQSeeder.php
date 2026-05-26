<?php

namespace Database\Seeders;

use App\Models\FAQ;
use Illuminate\Database\Seeder;

class FAQSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            [
                'category' => 'Shipping & Delivery',
                'question' => 'How long does delivery take?',
                'answer' => 'We offer nationwide delivery across South Africa. Estimated delivery time is 14–30 business days depending on your location. Free delivery is available on selected POS combo products.',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'category' => 'Shipping & Delivery',
                'question' => 'Do you deliver outside South Africa?',
                'answer' => 'Currently we only deliver within South Africa. For inquiries regarding delivery to neighbouring countries, please contact our sales team at sales@dennyexpress.co.za.',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'category' => 'Shipping & Delivery',
                'question' => 'What are the shipping costs?',
                'answer' => 'Shipping costs vary depending on your location and the size of your order. Many of our POS combo products qualify for free delivery. Contact us for a custom shipping quote.',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'category' => 'Payment Methods',
                'question' => 'What payment methods do you accept?',
                'answer' => 'We accept various payment methods including PayGate (credit/debit cards), PayJustNow (3 equal zero-interest instalments), Ozow (EFT), and direct bank deposits.',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'category' => 'Payment Methods',
                'question' => 'How does PayJustNow work?',
                'answer' => 'PayJustNow allows you to split your purchase into 3 equal, zero-interest instalments. Requirements: you must be over 18 years old, a South African resident, and have a valid debit or credit card and email address.',
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'category' => 'Payment Methods',
                'question' => 'Is Ozow safe and secure?',
                'answer' => 'Yes, Ozow is a secure EFT payment method that allows you to pay directly from your bank account without sharing your banking details with us. It is widely used and trusted in South Africa.',
                'sort_order' => 6,
                'is_active' => true,
            ],
            [
                'category' => 'Payment Methods',
                'question' => 'Can I pay via bank deposit or EFT?',
                'answer' => 'Yes, we accept direct bank deposits and EFT payments. Once payment is confirmed, your order will be processed and prepared for delivery.',
                'sort_order' => 7,
                'is_active' => true,
            ],
            [
                'category' => 'Warranty',
                'question' => 'What warranty do you offer on POS systems?',
                'answer' => 'We offer a standard 18-month warranty at a genuine warranty centre on most products. Some hardware items carry a 12-month carry-in warranty. Please check the product listing for specific warranty details.',
                'sort_order' => 8,
                'is_active' => true,
            ],
            [
                'category' => 'Warranty',
                'question' => 'Does the warranty cover refurbished products?',
                'answer' => 'Yes, our certified refurbished products come with a warranty as specified in the product listing. Refurbished units are thoroughly tested and restored to good working condition.',
                'sort_order' => 9,
                'is_active' => true,
            ],
            [
                'category' => 'Warranty',
                'question' => 'How do I claim warranty service?',
                'answer' => 'If you experience an issue with your product, contact our support team. For hardware issues, we offer a carry-in warranty service at our designated warranty centre.',
                'sort_order' => 10,
                'is_active' => true,
            ],
            [
                'category' => 'Software',
                'question' => 'Is the POS software free or do I pay monthly?',
                'answer' => 'We offer both options. Many of our POS combos include free software with no monthly charges (once-off purchase). We also have premium software options with yearly subscriptions for advanced features.',
                'sort_order' => 11,
                'is_active' => true,
            ],
            [
                'category' => 'Software',
                'question' => 'What features does the POS software include?',
                'answer' => 'Our POS software includes security, double entry accounting, VAT management, discounts, barcode support, inventory management, custom payments, loyalty programmes, promotions, credit management, and stock control. Free training and support are included.',
                'sort_order' => 12,
                'is_active' => true,
            ],
            [
                'category' => 'Software',
                'question' => 'Do you provide training on the POS software?',
                'answer' => 'Yes, we provide free training and support on all our POS software packages. Our team ensures you and your staff are comfortable using the system before going live.',
                'sort_order' => 13,
                'is_active' => true,
            ],
            [
                'category' => 'General',
                'question' => 'Can I get a custom POS system for my business?',
                'answer' => 'Absolutely. We offer custom POS configurations tailored to your business type — whether it is a tavern, restaurant, retail store, bottle store, or butchery. Contact us to discuss your requirements.',
                'sort_order' => 14,
                'is_active' => true,
            ],
            [
                'category' => 'General',
                'question' => 'Do you offer installation and setup services?',
                'answer' => 'Yes, installation and setup services are included with our multi-station combo packages. We can also arrange installation as an add-on service for other products. Contact us for details.',
                'sort_order' => 15,
                'is_active' => true,
            ],
            [
                'category' => 'General',
                'question' => 'How do I contact support?',
                'answer' => 'You can reach us via phone at +27 74 355 1336 or 012 023 3315, email us at Support1234@Ecomall.com, or send us a message on WhatsApp at +27743551336.',
                'sort_order' => 16,
                'is_active' => true,
            ],
        ];

        foreach ($faqs as $faq) {
            FAQ::create($faq);
        }
    }
}
