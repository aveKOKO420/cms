<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;


Route::resource('category', App\Http\Controllers\CategoryController::class);
Route::get('/categories', [App\Http\Controllers\CategoryController::class , 'index'])->name('categories.index');

