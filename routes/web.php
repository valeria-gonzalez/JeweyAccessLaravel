<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::view('/multistep', 'multistep')->name('multistep'); //last here

Route::middleware('auth')->group(function(){
    Route::resource('client', ClientController::class);
    Route::get('order/allorders', [OrderController::class, 'allorders'])->name('order.allorders');
    Route::resource('order', OrderController::class);
    Route::resource('product', ProductController::class);
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Route::get('prueba', function () {
//     return view('prueba');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('order', [OrderController::class, 'index'])->name('order.index');
});
