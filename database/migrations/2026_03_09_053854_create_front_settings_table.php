<?php

namespace Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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

        $frontSettingId = DB::table('front_settings')->insertGetId([
            'site_title' => 'Nutech Office System Pvt. Ltd.',
            'meta_description' => 'Modular office solutions',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

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

        DB::table('front_sliders')->insert([
            [
                'front_setting_id' => $frontSettingId,
                'first_half_image' => 'conference-table-hq.png',
                'second_half_image' => 'designer-office-furniture-hq.png',
                'title' => 'Innovative Modular Office & Workspace Solutions',
                'subtitle' => 'Manufacturer • Supplier • Interior Planner Since 2007',
                'description' => 'Nutech Office System Pvt. Ltd. specializes in high-quality modular workstations, executive tables, and customized partitions for corporate, banking, and educational sectors.',
                'sort_order' => 0,
                'is_blocked' => false,
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'front_setting_id' => $frontSettingId,
                'first_half_image' => 'full-height-office-partition-hq.png',
                'second_half_image' => 'work-station-hq.png',
                'title' => 'Ergonomic Designs for Productive Environments',
                'subtitle' => 'Trusted by ITC, Tata Steel, SBI & More',
                'description' => 'Transforming workspaces with AutoCAD-driven planning and 3D visualization. We deliver durable, space-efficient furniture with a focus on timely project execution.',
                'sort_order' => 1,
                'is_blocked' => false,
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'front_setting_id' => $frontSettingId,
                'first_half_image' => 'office-executive-table-hq.png',
                'second_half_image' => 'office-conference-table-hq.png',
                'title' => 'Custom Office Furniture Solutions',
                'subtitle' => 'Designed for Efficiency & Style',
                'description' => 'Our solutions include ergonomic executive tables, modular workstations, and storage units that enhance productivity and office aesthetics.',
                'sort_order' => 2,
                'is_blocked' => false,
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

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
            $table->string('heading')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->text('stats')->nullable();
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