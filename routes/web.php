<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;

//Criando a Rota para a pesquisa
Route::post('admin/categories/search', [CategoryController::class, 'search'])->name('categories.search');

//Criando a Rota para o Controller
Route::resource('admin/categories', CategoryController::class);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


