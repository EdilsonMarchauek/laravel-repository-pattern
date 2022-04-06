<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Criando a Rota para o Controller
Route::resource('admin/categories', 'App\Http\Controllers\Admin\CategoryController');


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


