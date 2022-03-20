<?php

use App\Http\Controllers\Post\PostCommentsController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\Post\PostRatingsController;
use App\Http\Controllers\Post\PostSearchController;
use Illuminate\Support\Facades\Route;

Route::prefix('posts')->group(function () {
    Route::get('/search', [PostSearchController::class, 'index'])->name('posts.search');
});

Route::controller(PostController::class)->prefix('posts')->group(function () {
    Route::get('/', 'index')->name('posts.index')->middleware('auth');
    Route::get('/create', 'create')->name('posts.create');
    Route::post('/create', 'store')->name('posts.store');
    Route::get('/{id}', 'show')->name('posts.show');
    Route::delete('/{id}/delete', 'destroy')->name('posts.delete');
});

Route::prefix('posts')->middleware('auth')->group(function () {
    Route::post('/{post}/comment', [PostCommentsController::class, 'store'])->name('posts.comments');
    Route::post('/{post}/rate', [PostRatingsController::class, 'store'])->name('posts.ratings');
    Route::delete('/{post}/rate', [PostRatingsController::class, 'destroy']);
});
