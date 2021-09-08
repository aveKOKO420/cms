<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentRepliesController;
use Illuminate\Support\Facades\Route;


Route::resource('comments', App\Http\Controllers\PostCommentsController::class);
Route::resource('comment/replies', App\Http\Controllers\CommentRepliesController::class);
//Route::get('/comments', [App\Http\Controllers\PostCommentsController::class , 'index'])->name('comments.index');

Route::post('/comment-reply', [App\Http\Controllers\CommentRepliesController::class, 'createReply'])->name('comment.replies');

Route::get('/comments/{comment}/replies', [App\Http\Controllers\CommentRepliesController::class , 'show'])->name('comment.replies.show');

//Route::get('/comments/create', [App\Http\Controllers\PostController::class, 'create'])->name('comments.create');
//
