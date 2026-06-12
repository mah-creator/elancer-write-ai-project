<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\NotificationController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Dashboard\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/{slug?}', HomeController::class)->name('home');

Route::get('/posts/{slug}', [App\Http\Controllers\PostController::class, 'show'])->name('posts.show');

Route::get('/u/{username}', function () { })->name('users.profile');

Route::group([
    'middleware' => 'auth',
    'controller' => FollowController::class
], function () {
    Route::post('/users/{user}/follow', 'store')->name('users.follow');
    Route::post('/users/{user}/unfollow', 'destroy')->name('users.unfollow');
});


Route::group([
    'middleware' => 'auth',
    'prefix' => 'dashboard', # routes will be prefixed with "dashboard/"
    'as' => 'dashboard.',   # route names will be prefixed with "dashboard."
], function () {
    Route::put('/posts/{id}/restore', [PostController::class, 'restore'])->name('posts.restore');
    Route::put('/posts/{id}/archive', [PostController::class, 'archive'])->name('posts.archive');
    Route::put('/posts/{id}/unarchive', [PostController::class, 'unarchive'])->name('posts.unarchive');
    Route::put('/posts/{id}/publish', [PostController::class, 'publish'])->name('posts.publish');
    Route::delete('/posts/{id}/force-delete', [PostController::class, 'forceDelete'])->name('posts.force-delete');
    Route::resource('posts', PostController::class);
    Route::resource('categories', CategoryController::class);

    Route::group([
        'prefix' => 'notifications',
        'as' => 'dashboard',
        'controller' => NotificationController::class
    ], function () {
        Route::get('/', 'index')->name('index');
        Route::post('/{notification}/read')->name('read');
        Route::post('/{notification}/unread')->name('unread');
        Route::delete('/{notification}')->name('destroy');
    });
});
