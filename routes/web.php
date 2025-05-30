<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/register', [AuthController::class, 'registerForm'])->name('registerForm');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'loginForm'])->name('loginForm');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/search', [PostController::class, 'searchForm'])->name('searchForm');

Route::get('/post/{post}', [PostController::class, 'showPost'])->name('showPost');
Route::get('/create-post', [PostController::class, 'createPostForm'])->name('createPostForm');


Route::middleware('auth')->group(function () {

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::post('/create-post', [PostController::class, 'createPost'])->name('createPost');
    Route::post('/delete-post/{post}', [CommentsController::class, 'destroyComment'])->name('destroyComment'); // Возможно, лучше переместить в PostController?

    Route::get('/favorites', [FavoriteController::class, 'ShowFav'])->name('showFav');
    Route::post('/favorites/add/{postId}', [FavoriteController::class, 'addFav'])->name('addFav');
    Route::delete('/favorites/remove/{postId}', [FavoriteController::class, 'removeFav'])->name('removeFav');

    Route::post('/add-comment', [CommentsController::class, 'addComment'])->name('addComment');
    Route::get('/comments/{post}', [CommentsController::class, 'showComment'])->name('showComment');
    Route::get('/comments', [CommentsController::class, 'getComments'])->name('getComments');
    Route::delete('/delete-comment/{comment}', [CommentsController::class, 'deleteComment'])->name('deleteComment');

    Route::get('/test', [TestController::class, 'test'])->name('test');
    Route::post('/check', [TestController::class, 'checkAnswer'])->name('checkAnswer');
});
