<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomEntryController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('welcome-lp');
});

Route::get('welcome', function () {
    return view('welcome');
});

Route::get('welcome-lp2', function () {
    return view('welcome-lp2');
});

// crudのルーティングを追加
Route::resource('room-entries', RoomEntryController::class);

Route::post('likes', [LikeController::class, 'store'])->name('likes.store');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('room-entries.index');
    })->name('dashboard');
});

Route::get('auth/google', [LoginController::class, 'redirectToGoogle'])->name('auth.google');

Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);
