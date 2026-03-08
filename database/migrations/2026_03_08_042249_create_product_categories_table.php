<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_categories', function (Blueprint $table) {

            $table->id();

            $table->string('name')->unique();

            $table->foreignId('parent_id')
                ->nullable()
                ->constrained('product_categories')
                ->nullOnDelete();

            $table->text('description')->nullable();

            $table->string('icon')->nullable();

            $table->boolean('is_blocked')->default(false);
            $table->boolean('is_deleted')->default(false);

            $table->timestamps();
        });

        DB::table('product_categories')->insert([
            [
                'name' => 'Reception Tables',
                'parent_id' => null,
                'description' => 'Reception desk furniture solutions',
                'icon' => null,
                'is_blocked' => false,
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Conference Tables',
                'parent_id' => null,
                'description' => 'Meeting and conference room tables',
                'icon' => null,
                'is_blocked' => false,
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Office Partitions',
                'parent_id' => null,
                'description' => 'Office space partition systems',
                'icon' => null,
                'is_blocked' => false,
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Office Tables',
                'parent_id' => null,
                'description' => 'Office work and executive tables',
                'icon' => null,
                'is_blocked' => false,
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Modular Workstations',
                'parent_id' => null,
                'description' => 'Team workstation desk systems',
                'icon' => null,
                'is_blocked' => false,
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Storage Solutions',
                'parent_id' => null,
                'description' => 'Office storage cabinets and solutions',
                'icon' => null,
                'is_blocked' => false,
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('product_categories');
    }
};