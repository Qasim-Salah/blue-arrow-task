<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('index');

Route::prefix('/notes')->name('notes.')->group(function () {

    Route::get('/', [NoteController::class, 'index'])->name('index');

    Route::group(['middleware' => 'auth'], function () {

        Route::get('/create', [NoteController::class, 'create'])->name('create');
        Route::post('/', [NoteController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [NoteController::class, 'edit'])->name('edit');
        Route::post('/{id}', [NoteController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [NoteController::class, 'destroy'])->name('delete');

    });

});

Route::prefix('/users')->name('users.')->group(function () {

Route::get('/statistics', [UserController::class, 'index'])->name('index');
Route::get('/{id}', [UserController::class, 'show'])->name('show');
Route::get('/{id}/notes', [UserController::class, 'usersNotes'])->name('notes');
});
