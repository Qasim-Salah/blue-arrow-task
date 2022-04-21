<?php

use App\Http\Controllers\API\V1\AuthController;
use App\Http\Controllers\API\V1\NoteController;
use App\Http\Controllers\API\V1\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['throttle:60,1'])->prefix('v1')->group(function () {

    Route::prefix('auth')->group(function () {
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/register', [AuthController::class, 'register']);
        Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');

    });
    Route::get('/users', [NoteController::class, 'index'])->name('index');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

    Route::prefix('/notes')->middleware('auth:api')->name('notes.')->group( function () {

        Route::post('/', [NoteController::class, 'store'])->name('store');
        Route::post('/{id}', [NoteController::class, 'update'])->name('update');
        Route::delete('/{id}', [NoteController::class, 'destroy'])->name('delete');

    });
});

