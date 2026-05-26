<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique()->index();
            $table->string('sku')->unique()->nullable()->index();
            $table->longText('description')->nullable();
            $table->text('short_description')->nullable();
            $table->decimal('price', 10, 2);
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->unsignedInteger('discount_percentage')->nullable();
            $table->enum('stock_status', ['in_stock', 'out_of_stock', 'pre_order', 'backorder'])->default('in_stock');
            $table->integer('stock_quantity')->default(0)->nullable();
            $table->decimal('weight', 8, 2)->nullable();
            $table->string('weight_unit', 2)->default('kg');
            $table->boolean('featured')->default(false);
            $table->boolean('on_sale')->default(false);
            $table->boolean('is_active')->default(true);
            $table->boolean('new_arrival')->default(false);
            $table->unsignedInteger('warranty_months')->default(18)->nullable();
            $table->unsignedInteger('delivery_estimate_days_min')->default(14)->nullable();
            $table->unsignedInteger('delivery_estimate_days_max')->default(30)->nullable();
            $table->json('specifications')->nullable();
            $table->json('what_included')->nullable();
            $table->json('tags')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('original_source_url')->nullable();
            $table->string('original_source_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
