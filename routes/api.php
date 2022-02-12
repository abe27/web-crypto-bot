<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthorizationController;
use App\Http\Controllers\Api\ApiExchangeBaseController;
use App\Http\Controllers\Api\InterestingBaseController;

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

Route::post('/auth', [AuthorizationController::class, 'auth'])->name(
    'auth.login'
);

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('/auth')->group(function () {
        Route::get('/profile', [
            AuthorizationController::class,
            'profile',
        ])->name('auth.profile');
        Route::post('/logout', [
            AuthorizationController::class,
            'destroy',
        ])->name('auth.logout');
    });

    Route::prefix('/apidata')->group(function () {
        Route::get('/get', [ApiExchangeBaseController::class, 'index'])->name(
            'api.apidata.get'
        );
        Route::get('/{apidata}/show', [
            ApiExchangeBaseController::class,
            'show',
        ])->name('api.apidata.show');
        Route::post('/create', [ApiExchangeBaseController::class, 'store'])->name(
            'api.apidata.create'
        );
        Route::put('/{apidata}/update', [
            ApiExchangeBaseController::class,
            'update',
        ])->name('api.apidata.update');
        Route::delete('/{apidata}/delete', [
            ApiExchangeBaseController::class,
            'destroy',
        ])->name('api.apidata.destroy');
    });

    Route::prefix('/interesting')->group(function () {
        Route::get('/get', [InterestingBaseController::class, 'index'])->name(
            'api.interesting.get'
        );

        Route::get('/{Interesting}/get', [
            InterestingBaseController::class,
            'show',
        ])->name('api.interesting.show');

        Route::post('/create', [
            InterestingBaseController::class,
            'store',
        ])->name('api.interesting.store');

        Route::put('/{Interesting}/update', [
            InterestingBaseController::class,
            'update',
        ])->name('api.interesting.update');

        Route::delete('/{Interesting}/delete', [
            InterestingBaseController::class,
            'destroy',
        ])->name('api.interesting.destroy');
    });
});
