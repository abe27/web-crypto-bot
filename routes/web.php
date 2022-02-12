<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\InterestingController;
use App\Http\Controllers\FollowUpController;
use App\Http\Controllers\ApiExchangeController;
use App\Http\Controllers\HelpCenterController;
use App\Http\Controllers\ProfileController;

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
    // return Inertia::render('Welcome', [
    //     'canLogin' => Route::has('login'),
    //     'canRegister' => Route::has('register'),
    //     'laravelVersion' => Application::VERSION,
    //     'phpVersion' => PHP_VERSION,
    // ]);
    return redirect('/dashboard');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('/api-data')->group(function () {
        Route::get('/index', [ApiExchangeController::class, 'index'])->name('api-data.index');
        Route::get('/get', [ApiExchangeController::class, 'get'])->name('api-data.get');
        Route::get('/create', [ApiExchangeController::class, 'create'])->name('api-data.create');
        Route::get('/{apiData}/show', [ApiExchangeController::class, 'show'])->name('api-data.show');
        Route::get('/exchange', [ApiExchangeController::class, 'exchange'])->name('api-data.exchange');
        Route::post('/store', [ApiExchangeController::class, 'store'])->name('api-data.store');
        Route::delete('/{apiData}/delete', [ApiExchangeController::class, 'destroy'])->name('api-data.delete');
    });
});

Route::get('/dashboard', [DashBoardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/interesting', [InterestingController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('interesting');

Route::get('/follow-up', [FollowUpController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('follow');

Route::get('/help-center', [HelpCenterController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('helpcenter');

Route::get('/profile', [ProfileController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('profile');

require __DIR__ . '/auth.php';
