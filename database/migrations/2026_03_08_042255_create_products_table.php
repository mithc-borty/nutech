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

            $table->foreignId('category_id')
                  ->nullable()
                  ->constrained('product_categories')
                  ->nullOnDelete();

            $table->string('title');
            $table->string('price')->nullable();
            $table->text('description')->nullable();
            $table->json('features')->nullable();
            $table->json('specifications')->nullable();

            $table->boolean('is_blocked')->default(false);
            $table->boolean('is_deleted')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};