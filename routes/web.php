<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Dashboard\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('/posts/{id}/{slug?}', [PostController::class, 'show'])->name('posts.show');

Route::group([
    'prefix' => 'dashboard', # routes will be prefixed with "dashboard/"
    'as' => 'dashboard.',   # route names will be prefixed with "dashboard."
], function () {
    Route::resource('posts', PostController::class);
    Route::resource('categories', CategoryController::class);
});
