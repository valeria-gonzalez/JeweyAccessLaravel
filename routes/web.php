<?php

use Illuminate\Support\Facades\Route;
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



Route::group(['middleware' => 'auth'], function(){
    Route::group([
        'prefix' => 'admin',
        'middleware' => 'is_admin',
        'as' => 'admin.',
    ], function(){
        Route::resource('client', \App\Http\Controllers\Admin\ClientController::class);
        Route::get('order.allorders', [\App\Http\Controllers\Admin\OrderController::class, 'allorders'])
            ->name('order.allorders');
        Route::resource('order', \App\Http\Controllers\Admin\OrderController::class);
        Route::resource('product', \App\Http\Controllers\Admin\ProductController::class);
    });

    Route::group([
        'prefix' => 'member',
        'as' => 'member.',
    ], function(){
        Route::get('order', [\App\Http\Controllers\Member\OrderController::class, 'index'])
            ->name('order.index');
    });

    // Route::resource('client', ClientController::class);
    // Route::get('order/allorders', [OrderController::class, 'allorders'])->name('order.allorders');
    // Route::resource('order', OrderController::class);
    // Route::resource('product', ProductController::class);
    // Route::get('/dashboard', function () {
    //      return view('dashboard');
    //  })->name('dashboard');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::group([
    //     'prefix' => 'admin',
    //     'middleware' => 'is_admin',
    //     'as' => 'admin.',
    // ], function(){
    //     Route::get('admin.order', [\App\Http\Controllers\Admin\OrderController::class, 'index'])
    //         ->name('admin.order.index');
    // });

    // Route::group([
    //     'prefix' => 'member',
    //     'as' => 'member.',
    // ], function(){
    //     Route::get('member.order', [\App\Http\Controllers\Member\OrderController::class, 'index'])
    //         ->name('member.order.index');
    // });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    // Route::get('order', [OrderController::class, 'index'])->name('order.index');
});
