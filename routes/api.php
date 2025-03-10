<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\DefaultMessageController;
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

Route::apiResource('default-messages', DefaultMessageController::class);

//Route::post('login', 'AuthController@login');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::middleware('auth:sanctum')->group(function () {
    Route::get('current-user', [AuthController::class, 'me'])->name('current-user');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot-password');
    Route::post('reset-password', [AuthController::class, 'resetPassword'])->name('reset-password');
    Route::put('change-password', [AuthController::class, 'changePassword'])->name('change-password');
    Route::post('initiateEmailChange', [AuthController::class, 'initiateEmailChange'])->name('initiateEmailChange');
    Route::post('confirmEmailChange', [AuthController::class, 'confirmEmailChange'])->name('confirmEmailChange');
    Route::post('initiatePhoneChange', [AuthController::class, 'initiatePhoneChange'])->name('initiatePhoneChange');
    Route::post('confirmPhoneChange', [AuthController::class, 'confirmPhoneChange'])->name('confirmPhoneChange');
});




