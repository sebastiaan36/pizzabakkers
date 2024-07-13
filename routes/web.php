<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\IngredientsController;
use App\Http\Controllers\DashboardController;
/*
Route::get('/', function () {
    return view('welcome');
});*/
Route::resource('/', DashboardController::class);
Route::resource('pizza', PizzaController::class);
Route::resource('ingredient', IngredientsController::class);
