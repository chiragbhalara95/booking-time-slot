<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('available-slot');
});


// available slot url
Route::get('/', [App\Http\Controllers\SlotsManageController::class, 'index'])->name('available-slots-view');
Route::post('/saveAvailableSlots', [App\Http\Controllers\SlotsManageController::class, 'saveAvailableSlots'])->name('save-available-slots');


// unavailable slot url
Route::get('/unavailable-slots', [App\Http\Controllers\SlotsManageController::class, 'unavailbleSlots'])->name('unavailable-slots-view');
Route::post('/saveUnavailableSlots', [App\Http\Controllers\SlotsManageController::class, 'saveUnavailableSlots'])->name('save-unavailable-slots');


// unavailable date url
Route::get('/unavailable-date', [App\Http\Controllers\SlotsManageController::class, 'unavailbleDates'])->name('unavailable-dates-view');
Route::post('/saveUnavailableDates', [App\Http\Controllers\SlotsManageController::class, 'saveUnavailableDates'])->name('save-unavailable-dates');


// Booking page url
Route::get('/booking-slots', [App\Http\Controllers\SlotsManageController::class, 'bookingSlots'])->name('booking-slots-view');
Route::post('/bookable-slots', [App\Http\Controllers\SlotsManageController::class, 'getBookableSlots'])->name('get-bookable-slots');
Route::post('/save-booking-slots', [App\Http\Controllers\SlotsManageController::class, 'saveBookableSlots'])->name('save-booking-slots');
