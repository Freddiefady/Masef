<?php

use App\Http\Controllers\api\Auth\AuthController;
use App\Http\Controllers\api\Auth\PhoneVerifyController;
use App\Http\Controllers\api\Auth\ProfileController;
use App\Http\Controllers\api\RoomsController;
use App\Http\Controllers\api\unitsController;
use Illuminate\Http\Request;
use App\Http\Resources\UserRescource;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/user', function (Request $request) {
        return UserRescource::make($request->user());

    });
    Route::put('/user/update', [ProfileController::class, 'updateProfile']);
    Route::prefix('verify/')->controller(PhoneVerifyController::class)->group(function(){
        Route::post('/', 'verify');
        Route::get('resend', 'resend');
    });
    Route::apiResource('units', unitsController::class);
    Route::apiResource('rooms', RoomsController::class);
});

Route::prefix('account/')->controller(AuthController::class)->group(function(){
    Route::post('register', 'register');
    Route::delete('logout', 'logout')->middleware('auth:sanctum');
    Route::delete('destroy', 'deleteAccount')->middleware('auth:sanctum');
});
