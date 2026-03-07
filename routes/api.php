<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Api\PrimaryController;

Route::prefix('admin')->group(function () {
    Route::post('login', [PrimaryController::class, 'login']);
    Route::post('forgot-password', [PrimaryController::class, 'forgotPassword']);
    Route::post('recover-password', [PrimaryController::class, 'recoverPassword']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('logout', [PrimaryController::class, 'logout']);
        Route::get('user', function (Request $request) {
            return $request->user();
        });

        Route::post('state-list', [PrimaryController::class, 'stateList']);
        Route::post('upload-profile-picture', [PrimaryController::class, 'uploadProfilePicture']);
        Route::post('update-profile', [PrimaryController::class, 'updateProfile']);
        Route::post('update-password', [PrimaryController::class, 'updatePassword']);
        Route::post('users', [PrimaryController::class, 'users']);
        Route::post('delete-users', [PrimaryController::class, 'deleteUsers']);
        Route::post('add-edit-user', [PrimaryController::class, 'addEditUser']);
        Route::post('check-username', [PrimaryController::class, 'checkUsername']);
    });
});
