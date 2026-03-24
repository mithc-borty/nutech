<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PrimaryController AS AdminPrimaryController;
use App\Http\Controllers\Front\PrimaryController AS FrontPrimaryController;
use App\Enums\UserTypeEnums;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/clear-all', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return 'Cleared!';
});

Route::get('/admin/debug-auth', function () {
    return response()->json([
        'authenticated' => Auth::check(),
        'user_id'       => Auth::id(),
        'session_id'    => session()->getId(),
        'cookies'       => request()->cookies->all(),
    ]);
});

Route::get('/', [FrontPrimaryController::class, 'index']);
Route::get('/about', [FrontPrimaryController::class, 'about']);
Route::get('/products', [FrontPrimaryController::class, 'products']);
Route::get('/services', [FrontPrimaryController::class, 'services']);
Route::get('/projects', [FrontPrimaryController::class, 'projects']);
Route::get('/support', [FrontPrimaryController::class, 'support']);
Route::get('/contact', [FrontPrimaryController::class, 'contact']);
Route::get('/quote', [FrontPrimaryController::class, 'quote']);

Route::prefix('admin')->middleware('web')->group(function () {
    Route::get('login', [AdminPrimaryController::class, 'login'])->name('admin.login');
    Route::get('forgot-password', [AdminPrimaryController::class, 'forgotPassword'])->name('admin.forgot_password');
    Route::get('recover-password', [AdminPrimaryController::class, 'recoverPassword'])->name('admin.recover_password');

    Route::middleware(['admin.auth:' . UserTypeEnums::admin->value . ',' . UserTypeEnums::super_admin->value])->group(function () {
        Route::get('/', [AdminPrimaryController::class, 'dashboard']);
        Route::get('dashboard', [AdminPrimaryController::class, 'dashboard']);
        Route::get('users', [AdminPrimaryController::class, 'users']);
        Route::get('add-edit-user/{id}', [AdminPrimaryController::class, 'addEditUser']);
        Route::get('product-categories', [AdminPrimaryController::class, 'productCategories']);
        Route::get('products', [AdminPrimaryController::class, 'products']);
        Route::get('settings', [AdminPrimaryController::class, 'settings']);

        Route::get('profile', [AdminPrimaryController::class, 'profile']);
        Route::get('logout', [AdminPrimaryController::class, 'logout']);    
    });
});
