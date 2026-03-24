<?php

namespace Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Enums\UserGenderEnums;
use App\Enums\UserTypeEnums;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {

            $table->id();

            $table->string('username')->unique();

            $table->enum(
                'user_type',
                collect(UserTypeEnums::cases())->map(fn($type) => $type->value)->toArray()
            )
            ->default(UserTypeEnums::user->value)
            ->comment(
                collect(UserTypeEnums::cases())->map(fn($type) => $type->value . '=' . $type->label())->implode(', ')
            );

            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');

            $table->string('email')->unique();
            $table->string('phone')->nullable()->unique();

            $table->string('password');

            $table->enum(
                'gender',
                collect(UserGenderEnums::cases())->map(fn($gender) => $gender->value)->toArray()
            )
            ->nullable()
            ->comment(
                collect(UserGenderEnums::cases())->map(fn($gender) => $gender->value . '=' . $gender->genderLabel())->implode(', ')
            );

            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('state_id')->nullable();
            $table->string('pin')->nullable();
            $table->integer('nationality_id')->nullable();
            $table->string('profile_image')->nullable();

            $table->rememberToken();
            
            $table->boolean('is_active')->default(true);
            $table->boolean('is_blocked')->default(false);
            $table->boolean('is_deleted')->default(false);

            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->id();
            $table->string('email')->index();
            $table->string('token')->unique();
            $table->string('otp_code', 6)->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index()->constrained('users')->nullOnDelete();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        DB::table('users')->insert([
            [
                'username' => 'superadmin',
                'user_type' => UserTypeEnums::super_admin->value,
                'first_name' => 'Super',
                'middle_name' => null,
                'last_name' => 'Admin',
                'email' => 'admin@admin.com',
                'phone' => null,
                'password' => bcrypt('Admin@123'),
                'gender' => UserGenderEnums::male->value,
                'address1' => null,
                'address2' => null,
                'country_id' => null,
                'state_id' => null,
                'pin' => null,
                'nationality_id' => null,
                'profile_image' => null,
                'is_active' => true,
                'is_blocked' => false,
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'username' => 'manager01',
                'user_type' => UserTypeEnums::manager->value,
                'first_name' => 'Rahul',
                'middle_name' => null,
                'last_name' => 'Sen',
                'email' => 'rahul.manager@mail.com',
                'phone' => '9000000001',
                'password' => bcrypt('password'),
                'gender' => UserGenderEnums::male->value,
                'address1' => null,
                'address2' => null,
                'country_id' => null,
                'state_id' => null,
                'pin' => null,
                'nationality_id' => null,
                'profile_image' => null,
                'is_active' => true,
                'is_blocked' => false,
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'username' => 'editor01',
                'user_type' => UserTypeEnums::editor->value,
                'first_name' => 'Priya',
                'middle_name' => null,
                'last_name' => 'Das',
                'email' => 'priya.editor@mail.com',
                'phone' => '9000000002',
                'password' => bcrypt('password'),
                'gender' => UserGenderEnums::female->value,
                'address1' => null,
                'address2' => null,
                'country_id' => null,
                'state_id' => null,
                'pin' => null,
                'nationality_id' => null,
                'profile_image' => null,
                'is_active' => true,
                'is_blocked' => false,
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'username' => 'operator01',
                'user_type' => UserTypeEnums::operator->value,
                'first_name' => 'Amit',
                'middle_name' => null,
                'last_name' => 'Roy',
                'email' => 'amit.operator@mail.com',
                'phone' => '9000000003',
                'password' => bcrypt('password'),
                'gender' => UserGenderEnums::male->value,
                'address1' => null,
                'address2' => null,
                'country_id' => null,
                'state_id' => null,
                'pin' => null,
                'nationality_id' => null,
                'profile_image' => null,
                'is_active' => true,
                'is_blocked' => false,
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'username' => 'user01',
                'user_type' => UserTypeEnums::user->value,
                'first_name' => 'Sneha',
                'middle_name' => null,
                'last_name' => 'Paul',
                'email' => 'sneha.user@mail.com',
                'phone' => '9000000004',
                'password' => bcrypt('password'),
                'gender' => UserGenderEnums::female->value,
                'address1' => null,
                'address2' => null,
                'country_id' => null,
                'state_id' => null,
                'pin' => null,
                'nationality_id' => null,
                'profile_image' => null,
                'is_active' => true,
                'is_blocked' => false,
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'username' => 'user02',
                'user_type' => UserTypeEnums::manager->value,
                'first_name' => 'Anil',
                'middle_name' => null,
                'last_name' => 'Sharma',
                'email' => 'anil.manager@mail.com',
                'phone' => '9000000005',
                'password' => bcrypt('password'),
                'gender' => UserGenderEnums::male->value,
                'address1' => null,
                'address2' => null,
                'country_id' => null,
                'state_id' => null,
                'pin' => null,
                'nationality_id' => null,
                'profile_image' => null,
                'is_active' => true,
                'is_blocked' => false,
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'username' => 'user03',
                'user_type' => UserTypeEnums::editor->value,
                'first_name' => 'Rina',
                'middle_name' => null,
                'last_name' => 'Mukherjee',
                'email' => 'rina.editor@mail.com',
                'phone' => '9000000006',
                'password' => bcrypt('password'),
                'gender' => UserGenderEnums::female->value,
                'address1' => null,
                'address2' => null,
                'country_id' => null,
                'state_id' => null,
                'pin' => null,
                'nationality_id' => null,
                'profile_image' => null,
                'is_active' => true,
                'is_blocked' => false,
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'username' => 'user04',
                'user_type' => UserTypeEnums::operator->value,
                'first_name' => 'Sanjay',
                'middle_name' => null,
                'last_name' => 'Das',
                'email' => 'sanjay.operator@mail.com',
                'phone' => '9000000007',
                'password' => bcrypt('password'),
                'gender' => UserGenderEnums::male->value,
                'address1' => null,
                'address2' => null,
                'country_id' => null,
                'state_id' => null,
                'pin' => null,
                'nationality_id' => null,
                'profile_image' => null,
                'is_active' => true,
                'is_blocked' => false,
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'username' => 'user05',
                'user_type' => UserTypeEnums::user->value,
                'first_name' => 'Pooja',
                'middle_name' => null,
                'last_name' => 'Roy',
                'email' => 'pooja.user@mail.com',
                'phone' => '9000000008',
                'password' => bcrypt('password'),
                'gender' => UserGenderEnums::female->value,
                'address1' => null,
                'address2' => null,
                'country_id' => null,
                'state_id' => null,
                'pin' => null,
                'nationality_id' => null,
                'profile_image' => null,
                'is_active' => true,
                'is_blocked' => false,
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'username' => 'user06',
                'user_type' => UserTypeEnums::manager->value,
                'first_name' => 'Vikram',
                'middle_name' => null,
                'last_name' => 'Bose',
                'email' => 'vikram.manager@mail.com',
                'phone' => '9000000009',
                'password' => bcrypt('password'),
                'gender' => UserGenderEnums::male->value,
                'address1' => null,
                'address2' => null,
                'country_id' => null,
                'state_id' => null,
                'pin' => null,
                'nationality_id' => null,
                'profile_image' => null,
                'is_active' => true,
                'is_blocked' => false,
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'username' => 'user07',
                'user_type' => UserTypeEnums::editor->value,
                'first_name' => 'Snehal',
                'middle_name' => null,
                'last_name' => 'Kumar',
                'email' => 'snehal.editor@mail.com',
                'phone' => '9000000010',
                'password' => bcrypt('password'),
                'gender' => UserGenderEnums::male->value,
                'address1' => null,
                'address2' => null,
                'country_id' => null,
                'state_id' => null,
                'pin' => null,
                'nationality_id' => null,
                'profile_image' => null,
                'is_active' => true,
                'is_blocked' => false,
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'username' => 'user08',
                'user_type' => UserTypeEnums::operator->value,
                'first_name' => 'Ananya',
                'middle_name' => null,
                'last_name' => 'Roy',
                'email' => 'ananya.operator@mail.com',
                'phone' => '9000000011',
                'password' => bcrypt('password'),
                'gender' => UserGenderEnums::female->value,
                'address1' => null,
                'address2' => null,
                'country_id' => null,
                'state_id' => null,
                'pin' => null,
                'nationality_id' => null,
                'profile_image' => null,
                'is_active' => true,
                'is_blocked' => false,
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'username' => 'user09',
                'user_type' => UserTypeEnums::user->value,
                'first_name' => 'Kiran',
                'middle_name' => null,
                'last_name' => 'Das',
                'email' => 'kiran.user@mail.com',
                'phone' => '9000000012',
                'password' => bcrypt('password'),
                'gender' => UserGenderEnums::male->value,
                'address1' => null,
                'address2' => null,
                'country_id' => null,
                'state_id' => null,
                'pin' => null,
                'nationality_id' => null,
                'profile_image' => null,
                'is_active' => true,
                'is_blocked' => false,
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'username' => 'user10',
                'user_type' => UserTypeEnums::manager->value,
                'first_name' => 'Rohit',
                'middle_name' => null,
                'last_name' => 'Sen',
                'email' => 'rohit.manager@mail.com',
                'phone' => '9000000013',
                'password' => bcrypt('password'),
                'gender' => UserGenderEnums::male->value,
                'address1' => null,
                'address2' => null,
                'country_id' => null,
                'state_id' => null,
                'pin' => null,
                'nationality_id' => null,
                'profile_image' => null,
                'is_active' => true,
                'is_blocked' => false,
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};