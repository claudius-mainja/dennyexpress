<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payment_gateway_credentials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payment_gateway_id')->constrained()->cascadeOnDelete();
            $table->string('merchant_id')->nullable();
            $table->text('merchant_key')->nullable();
            $table->text('public_key')->nullable();
            $table->text('secret_key')->nullable();
            $table->text('passphrase')->nullable();
            $table->text('webhook_secret')->nullable();
            $table->json('additional_config')->nullable();
            $table->timestamps();

            $table->unique('payment_gateway_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_gateway_credentials');
    }
};
