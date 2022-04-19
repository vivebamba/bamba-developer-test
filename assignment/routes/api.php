<?php

use App\Http\Controllers\API\AuditoriumController;
use App\Http\Controllers\API\BookerController;
use App\Http\Controllers\API\BookingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/auditoriums', [AuditoriumController::class, 'index']);
Route::get('/show-auditorium/{id}', [AuditoriumController::class, 'show']);
Route::post('/save-booking', [BookingController::class, 'store']);
Route::get('/show-booking/{token}', [BookingController::class, 'show']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
