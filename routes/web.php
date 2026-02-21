<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\PrimaryController;

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', [PrimaryController::class, 'index']);
Route::get('/about', [PrimaryController::class, 'about']);
Route::get('/products', [PrimaryController::class, 'products']);
Route::get('/service', [PrimaryController::class, 'service']);
Route::get('/projects', [PrimaryController::class, 'projects']);
Route::get('/support', [PrimaryController::class, 'support']);
Route::get('/contact', [PrimaryController::class, 'contact']);
Route::get('/quote', [PrimaryController::class, 'quote']);