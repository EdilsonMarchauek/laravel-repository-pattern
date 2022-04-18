<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;

//Criando a rota para a pesquisa
Route::any('admin/products/search', [ProductController::class, 'search'])->name('products.search');

//Criando a Rota para o Controller
Route::resource('admin/products', ProductController::class);

Route::get('home', function(){
})->name('home');

//Criando a Rota para a pesquisa
Route::any('admin/categories/search', [CategoryController::class, 'search'])->name('categories.search');

//Criando a Rota para o Controller
Route::resource('admin/categories', CategoryController::class);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


