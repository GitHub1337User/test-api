<?php

use App\Http\Controllers\Api\BookingApiController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\AuthController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::group(['middleware' => 'api', 'prefix' => 'auth'], function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/users',[UserApiController::class,'index']);
    Route::get('/user/{id}',[UserApiController::class,'getUser']);
    Route::get('/user/{id}/bookings',[UserApiController::class,'getBookings'])->name('user-bookings');
    Route::get('/bookings/sorted/{status}',[BookingApiController::class,'index']);
    Route::get('/booking/{id}',[BookingApiController::class,'getBooking']);
    Route::delete('/booking/delete/{id}',[BookingApiController::class,'delete']);
    Route::post('/bookings/create',[BookingApiController::class,'create']);
    Route::patch('/bookings/patch/{id}',[BookingApiController::class,'patch']);
});
