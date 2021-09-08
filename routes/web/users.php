<?php

use App\Http\Controllers\AdminsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::put('/users/{user}/update', [App\Http\Controllers\UserController::class , 'update'])->name('user.profile.update');

Route::put('/users', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');


Route::middleware('role:Admin')->group(function (){

    Route::get('/users', [App\Http\Controllers\UserController::class , 'index'])->name('user.index');
    Route::put('/users/{user}/attach', [App\Http\Controllers\UserController::class , 'attach'])->name('user.role.attach');
    Route::put('/users/{user}/detach', [App\Http\Controllers\UserController::class , 'detach'])->name('user.role.detach');
    Route::delete('/users/{user}/destroy', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');



});

Route::middleware(['auth','can:view,user'])->group(function () {
    Route::get('/users/{user}/profile', [App\Http\Controllers\UserController::class , 'show'])->name('user.profile.show');

});
