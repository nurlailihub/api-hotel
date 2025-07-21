<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RoomsController;
use App\Http\Controllers\Api\BookingsController;
use App\Http\Controllers\Api\PaymentsController;
use App\Http\Controllers\Api\RoomAvailabilityController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin.dashboard');
});

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/bookings', [AdminController::class, 'bookings'])->name('admin.bookings');
    Route::get('/rooms', [AdminController::class, 'rooms'])->name('admin.rooms');
    Route::get('/payments', [AdminController::class, 'payments'])->name('admin.payments');
    Route::get('/availability', [AdminController::class, 'availability'])->name('admin.availability');
    Route::get('/bookings/create', [AdminController::class, 'createBooking'])->name('admin.bookings.create');
    Route::post('/bookings', [AdminController::class, 'storeBooking'])->name('admin.bookings.store');
    Route::get('/bookings/{id}/edit', [AdminController::class, 'editBooking'])->name('admin.bookings.edit');
    Route::put('/bookings/{id}', [AdminController::class, 'updateBooking'])->name('admin.bookings.update');
    Route::delete('/bookings/{id}', [AdminController::class, 'destroyBooking'])->name('admin.bookings.destroy');
});

Route::prefix('api')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::apiResource('rooms', RoomsController::class);
    Route::apiResource('bookings', BookingsController::class);
    Route::apiResource('payments', PaymentsController::class);
    Route::apiResource('room-availability', RoomAvailabilityController::class);
});
