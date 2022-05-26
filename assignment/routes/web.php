<?php

use App\Http\Controllers\CinemaController;
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

Route::controller(CinemaController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::name('movie.')->group(function () {
        Route::get('/{slug}', 'showTimesOfMovie')->name('time');
        Route::get('/{slug}/{booking}', 'scheduleMovieBooking')->name('schedule');
    });
});
