<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomEntryController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('room-entries', RoomEntryController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
