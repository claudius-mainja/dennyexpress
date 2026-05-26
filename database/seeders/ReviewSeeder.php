<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ReviewSeeder extends Seeder
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
        
        $reviews = $json['reviews'] ?? [];
        
        if (empty($reviews)) {
            $this->command->warn("No reviews found in JSON");
            return;
        }

        $productIds = Product::pluck('id')->toArray();
        
        if (empty($productIds)) {
            $this->command->warn("No products found to attach reviews to");
            return;
        }

        foreach ($reviews as $index => $reviewData) {
            $productId = $productIds[$index % count($productIds)];

            Review::create([
                'product_id' => $productId,
                'rating' => $reviewData['rating'] ?? 5,
                'author_name' => $reviewData['author'] ?? null,
                'body' => $reviewData['text'] ?? null,
                'is_approved' => true,
                'verified' => true,
                'source' => 'google',
                'created_at' => isset($reviewData['date']) ? $reviewData['date'] . ' 10:00:00' : now(),
                'updated_at' => isset($reviewData['date']) ? $reviewData['date'] . ' 10:00:00' : now(),
            ]);
        }
        
        $this->command->info("Imported " . count($reviews) . " reviews");
    }
}
