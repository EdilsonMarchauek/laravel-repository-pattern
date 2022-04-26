<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\SiteController;

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

    Route::any('products/search', [ProductController::class, 'search'])->name('products.search');
    Route::resource('products', ProductController::class);
    Route::any('categories/search', [CategoryController::class, 'search'])->name('categories.search');
    Route::resource('categories', CategoryController::class);

    //Para criar o controller informar conforme abaixo
    Route::get('/', [DashboardController::class, 'index'])->name('admin');
});

Auth::routes(['register' => false]);

Route::get('/', [SiteController::class, 'index']);

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('home', function(){
// })->name('home');


