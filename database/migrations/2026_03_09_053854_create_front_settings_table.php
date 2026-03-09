<?php

namespace Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('front_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('front_logo')->nullable();
            $table->string('favicon')->nullable();
            $table->text('footer_text')->nullable();
            $table->string('about_heading')->nullable();
            $table->text('about_desc')->nullable();
            $table->string('about_image')->nullable();
            $table->string('cta_heading')->nullable();
            $table->string('cta_subheading')->nullable();
            $table->string('cta_btn_text')->nullable();
            $table->string('cta_btn_url')->nullable();
            $table->string('cta_bg_image')->nullable();
            $table->boolean('is_blocked')->default(false);
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();
        });

        Schema::create('front_sliders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('front_setting_id')->constrained('front_settings')->cascadeOnDelete();
            $table->string('first_half_image')->nullable();
            $table->string('second_half_image')->nullable();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_blocked')->default(false);
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();
        });

        Schema::create('front_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('front_setting_id')->constrained('front_settings')->cascadeOnDelete();
            $table->string('icon')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_blocked')->default(false);
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();
        });

        Schema::create('front_clients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('front_setting_id')->constrained('front_settings')->cascadeOnDelete();
            $table->string('client_name')->nullable();
            $table->string('logo')->nullable();
            $table->string('industry')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_blocked')->default(false);
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();
        });

        Schema::create('front_about_stats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('front_setting_id')->constrained('front_settings')->cascadeOnDelete();
            $table->string('title')->nullable();
            $table->string('icon')->nullable();
            $table->integer('value')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_blocked')->default(false);
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('front_about_stats');
        Schema::dropIfExists('front_clients');
        Schema::dropIfExists('front_services');
        Schema::dropIfExists('front_sliders');
        Schema::dropIfExists('front_settings');
    }
};