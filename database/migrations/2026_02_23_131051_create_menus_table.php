<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('menu_name');
            $table->string('slug')->unique();
            $table->string('menu_key')->unique();
            $table->string('icon')->nullable();
            $table->integer('menu_order')->default(0);
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->boolean('is_blocked')->default(false);
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();

            $table->foreign('parent_id')
                  ->references('id')
                  ->on('menus')
                  ->onDelete('cascade');
        });

        DB::table('menus')->insert([
            [
                'menu_name' => 'Dashboard',
                'slug' => 'dashboard',
                'menu_key' => 'dashboard',
                'icon' => 'fas fa-home',
                'menu_order' => 1,
                'parent_id' => null,
                'is_blocked' => false,
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'menu_name' => 'Users',
                'slug' => 'users',
                'menu_key' => 'users',
                'icon' => 'fas fa-users',
                'menu_order' => 2,
                'parent_id' => null,
                'is_blocked' => false,
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'menu_name' => 'Products',
                'slug' => 'products',
                'menu_key' => 'products',
                'icon' => 'fas fa-cube',
                'menu_order' => 3,
                'parent_id' => null,
                'is_blocked' => false,
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'menu_name' => 'Settings',
                'slug' => 'settings',
                'menu_key' => 'settings',
                'icon' => 'fas fa-cog',
                'menu_order' => 4,
                'parent_id' => null,
                'is_blocked' => false,
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};