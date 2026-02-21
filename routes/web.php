<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\PrimaryController;

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', [PrimaryController::class, 'index']);
