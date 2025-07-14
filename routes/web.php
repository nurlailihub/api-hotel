<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RoomsController;
use App\Http\Controllers\Api\BookingsController;
use App\Http\Controllers\Api\PaymentsController;
use App\Http\Controllers\Api\RoomAvailabilityController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('api')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::apiResource('rooms', RoomsController::class);
    Route::apiResource('bookings', BookingsController::class);
    Route::apiResource('payments', PaymentsController::class);
    Route::apiResource('room-availability', RoomAvailabilityController::class);
});
