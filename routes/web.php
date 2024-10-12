<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomEntryController;
use App\Http\Controllers\LikeController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('room-entries', RoomEntryController::class);

Route::post('likes', [LikeController::class, 'store'])->name('likes.store');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
