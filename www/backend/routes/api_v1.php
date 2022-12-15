<?php

use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\ContractServiceController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\UserBalanceController;
use App\Http\Controllers\Api\UserProfileController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Http\Controllers\CsrfCookieController;

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

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiResource('companies', CompanyController::class);
    //Route::apiResource('services', ServiceController::class); // все возможные услуги
    Route::apiResource('contract_services', ContractServiceController::class); // услуги по договору

    Route::get('/user_profile', [UserProfileController::class, 'index']);
    Route::get('/user_balance', [UserBalanceController::class, 'index']);

    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/csrf', [CsrfCookieController::class, 'show'])->name('csrf');

