<?php

use App\Http\Controllers\Web\BookingContoller;
use App\Http\Controllers\Web\ProductController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    //REDIRECT TO DASHBOARD AFTER LOGIN
    Route::get('/', function () {
        return to_route('products.create');
    });

    //Dashboard Render
    Route::get('/dashboard', [BookingContoller::class, 'dashboard'])->name('products.create');

    // Route::get('/create-booking', [BookingContoller::class, 'createBooking'])->name('booking.create');

    // Route::post('/create-booking', [BookingContoller::class, 'store'])->name('booking.store');


    //priduct store route -- create
    Route::post('/dashboard', [ProductController::class, 'store'])->name('products.store');

    Route::get('/products/list', [ProductController::class, 'productsList'])->name('products-list');

    Route::put('products/{product}/edit', [ProductController::class, 'productsUpdate'])->name('products.update');

    Route::get('/products/{product}/edit', [ProductController::class, 'productsEdit'])->name('products-edit');

    Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
});
