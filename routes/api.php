<?php

use App\Http\Controllers\api\Auth\AuthController;
use App\Http\Controllers\api\Auth\PhoneVerifyController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('account/')->controller(AuthController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
    Route::delete('logout', 'logout');
    Route::delete('destroy', 'deleteAccount');
});

Route::prefix('verify/')->middleware('auth:sanctum')->controller(PhoneVerifyController::class)->group(function(){
    Route::post('/', 'verify');
    Route::get('login', 'resend');
});
