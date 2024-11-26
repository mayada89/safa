<?php

use App\Booking\Actions\CreateBookingAction;
use App\Pitche\Actions\ListPitcheSlotsAction;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::group(["prefix" => "slots"], function () {
    Route::post("/{pitche}", ListPitcheSlotsAction::class)->name("slots.index");

});

Route::group(["prefix" => "bookings"], function () {
    Route::post("/", CreateBookingAction::class)->name("bookings.index");

});
