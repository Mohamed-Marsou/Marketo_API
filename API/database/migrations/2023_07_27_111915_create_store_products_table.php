<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('store_products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('status');
            $table->text('description');
            $table->text('short_description');
            $table->string('SKU')->nullable();
            $table->decimal('price', 10, 2);
            $table->integer('stock_quantity')->nullable();
            $table->json('weight')->nullable();
            $table->json('dimensions')->nullable();
            $table->json('category')->nullable();
            $table->json('tag')->nullable();
            $table->json('images');
            $table->json('attributes')->nullable();
            $table->decimal('average_rating', 3, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('store_products');
    }
};
