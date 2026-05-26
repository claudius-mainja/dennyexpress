<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            [
                'title' => 'About Us',
                'slug' => 'about',
                'content' => "<h2>About Denny Express</h2>\n<p>Denny Express has a strong focus on providing cutting-edge solutions to businesses of all sizes. We offer a comprehensive range of POS systems, hardware, and IT equipment tailored to the South African market.</p>\n<p>With over 7 years in business, Denny Express has grown to become a trusted provider of point of sale solutions for small to medium businesses. We help our clients accurately manage sales, stock control, and accounting with reliable, affordable technology.</p>\n<p>Our mission is to set industry benchmarks for excellence, constantly innovating and adapting to emerging technologies. We believe in fostering enduring relationships with our clients, suppliers, and employees.</p>\n<p>Located at 187 Alexandra, Halfway House, Midrand, Gauteng, we serve customers nationwide across South Africa.</p>",
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Contact Us',
                'slug' => 'contact',
                'content' => "<h2>Get in Touch</h2>\n<p>We would love to hear from you. Whether you have a question about our products, need a custom POS solution, or want to place an order, our team is here to help.</p>\n<h3>Our Details</h3>\n<p><strong>Address:</strong> 187 Alexandra, Halfway House, Midrand, Gauteng, South Africa</p>\n<p><strong>Sales Enquiries:</strong> sales@dennyexpress.co.za</p>\n<p><strong>Support:</strong> Support1234@Ecomall.com</p>\n<p><strong>Phone:</strong> +27 74 355 1336 | 012 023 3315</p>\n<p><strong>WhatsApp:</strong> +27 74 355 1336</p>\n<h3>Business Hours</h3>\n<p>Monday – Friday: 08:00 – 17:00<br>Saturday: 09:00 – 13:00<br>Sunday & Public Holidays: Closed</p>",
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Terms and Conditions',
                'slug' => 'terms',
                'content' => "<h2>Terms and Conditions</h2>\n<p>Please read these terms and conditions carefully before using our website or placing an order.</p>\n<h3>General</h3>\n<p>By placing an order with Denny Express, you agree to be bound by these terms and conditions. All products and services are subject to availability.</p>\n<h3>Pricing</h3>\n<p>All prices are in South African Rand (ZAR) and include VAT where applicable. We reserve the right to change prices without prior notice.</p>\n<h3>Orders</h3>\n<p>Orders are confirmed once payment has been received. We reserve the right to refuse or cancel any order at our discretion.</p>\n<h3>Delivery</h3>\n<p>Estimated delivery times are 14–30 business days. While we strive to meet these estimates, we are not liable for delays beyond our control.</p>\n<h3>Returns</h3>\n<p>Please refer to our Returns & Refunds policy for information on returns, exchanges, and cancellations.</p>\n<h3>Limitation of Liability</h3>\n<p>Denny Express shall not be liable for any indirect, incidental, or consequential damages arising from the use of our products or services.</p>",
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Privacy Policy',
                'slug' => 'privacy',
                'content' => "<h2>Privacy Policy</h2>\n<p>Denny Express respects your privacy and is committed to protecting your personal information.</p>\n<h3>Information We Collect</h3>\n<p>We collect information you provide when placing an order, creating an account, or contacting us. This may include your name, email address, phone number, shipping address, and payment details.</p>\n<h3>How We Use Your Information</h3>\n<p>We use your information to process orders, communicate with you about your purchases, improve our services, and send marketing communications (with your consent).</p>\n<h3>Data Security</h3>\n<p>We implement appropriate security measures to protect your personal information. Payment transactions are processed securely through our payment partners.</p>\n<h3>Third Parties</h3>\n<p>We do not sell or share your personal information with third parties for their marketing purposes. We may share information with trusted service providers for order fulfilment and payment processing.</p>\n<h3>Contact</h3>\n<p>If you have any questions about this privacy policy, please contact us at sales@dennyexpress.co.za.</p>",
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'title' => 'Returns & Refunds',
                'slug' => 'returns',
                'content' => "<h2>Returns & Refunds Policy</h2>\n<p>We want you to be completely satisfied with your purchase from Denny Express.</p>\n<h3>Return Window</h3>\n<p>Returns are accepted within 7 days of delivery for defective or incorrect items. All returned items must be in original condition with all accessories and packaging.</p>\n<h3>Defective Products</h3>\n<p>If you receive a defective product, please contact our support team immediately. We will arrange for inspection and, if confirmed defective, provide a replacement or refund.</p>\n<h3>Non-Returnable Items</h3>\n<p>Software licenses, consumables (thermal paper, labels), and custom-configured POS systems cannot be returned unless defective.</p>\n<h3>Refund Process</h3>\n<p>Refunds will be processed within 5–10 business days after the returned item is received and inspected. Refunds are issued to the original payment method.</p>\n<h3>Shipping Costs</h3>\n<p>Return shipping costs for defective items are covered by Denny Express. For change-of-mind returns, the customer is responsible for return shipping.</p>",
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'title' => 'Warranty',
                'slug' => 'warranty',
                'content' => "<h2>Warranty Information</h2>\n<p>Denny Express stands behind the quality of our products with comprehensive warranty coverage.</p>\n<h3>Standard Warranty</h3>\n<p>Most products come with an 18-month warranty at a genuine warranty centre. This covers manufacturing defects and hardware failures under normal use.</p>\n<h3>Hardware Warranty</h3>\n<p>Some hardware products carry a 12-month carry-in warranty. Please refer to the specific product listing for warranty details.</p>\n<h3>What is Covered</h3>\n<p>Our warranty covers defects in materials and workmanship. It does not cover damage from misuse, accidents, unauthorized modifications, or normal wear and tear.</p>\n<h3>How to Claim</h3>\n<p>Contact our support team with your order number and a description of the issue. We will guide you through the warranty claim process.</p>",
                'is_active' => true,
                'sort_order' => 6,
            ],
            [
                'title' => 'Shipping & Delivery',
                'slug' => 'shipping',
                'content' => "<h2>Shipping & Delivery Information</h2>\n<p>We offer nationwide delivery across South Africa on all orders.</p>\n<h3>Delivery Time</h3>\n<p>Estimated delivery time is 14–30 days depending on your location. Some products may qualify for expedited shipping — please contact us for details.</p>\n<h3>Shipping Costs</h3>\n<p>Shipping costs are calculated at checkout based on your delivery address and order size. Selected POS combo products qualify for free delivery.</p>\n<h3>Delivery Areas</h3>\n<p>We deliver to all provinces in South Africa including major cities and rural areas. If you are unsure about delivery to your area, please contact us.</p>\n<h3>Order Tracking</h3>\n<p>Once your order is dispatched, you will receive a tracking number via email or WhatsApp to follow your delivery.</p>",
                'is_active' => true,
                'sort_order' => 7,
            ],
            [
                'title' => 'FAQ',
                'slug' => 'faq',
                'content' => "<h2>Frequently Asked Questions</h2>\n<p>Find answers to common questions about our products, shipping, payment, and more. Browse our FAQ categories below for quick answers.</p>\n<p>If you cannot find what you are looking for, feel free to contact our support team.</p>",
                'is_active' => true,
                'sort_order' => 8,
            ],
            [
                'title' => 'Support',
                'slug' => 'support',
                'content' => "<h2>Customer Support</h2>\n<p>Need help? Our support team is here to assist you with product inquiries, technical support, warranty claims, and any other questions.</p>\n<h3>Contact Support</h3>\n<p><strong>Email:</strong> Support1234@Ecomall.com</p>\n<p><strong>Phone:</strong> +27 74 355 1336 | 012 023 3315</p>\n<p><strong>WhatsApp:</strong> +27 74 355 1336</p>\n<h3>Technical Support</h3>\n<p>For technical assistance with your POS system, printer, scanner, or software, our trained technicians are available to help. We offer remote support and on-site service where available.</p>\n<h3>Free Training</h3>\n<p>All our POS software purchases include free training. Our team will ensure you and your staff are fully trained on your new system.</p>",
                'is_active' => true,
                'sort_order' => 9,
            ],
        ];

        foreach ($pages as $page) {
            Page::create($page);
        }
    }
}
