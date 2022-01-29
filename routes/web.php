<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\PurchaserController;

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
    return view('welcome');
});


Route::prefix('seller')->group(function () {
    Route::get('/login', [SellerController::class, 'loginForm'])->name('login_form');
    Route::post('/login', [SellerController::class, 'login'])->name('seller.login');
    Route::post('/logout', [SellerController::class, 'logout'])
        ->name('seller.logout')
        ->middleware('seller');

    Route::get('/dashboard', [SellerController::class, 'dashboard'])
        ->name('seller.dashboard')
        ->middleware('seller');
});

Route::prefix('purchaser')->group(function () {
    Route::get('/login', [PurchaserController::class, 'loginForm'])->name('purchaser.login_form');
    Route::post('/login', [PurchaserController::class, 'login'])->name('purchaser.login');
    Route::post('/logout', [PurchaserController::class, 'logout'])
        ->name('purchaser.logout')
        ->middleware('purchaser');

    Route::get('/dashboard', [PurchaserController::class, 'dashboard'])
        ->name('purchaser.dashboard')
        ->middleware('purchaser');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//Route::prefix('seller')->group(function () {
//    Route::get('/dashboard', function () {
//        echo 'hey';
//    })->middleware('auth:seller');
//});

require __DIR__.'/auth.php';
