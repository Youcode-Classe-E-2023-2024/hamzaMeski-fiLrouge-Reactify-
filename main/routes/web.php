<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;

/* main route */
Route::get('/', [MainController::class, 'index'])->name('main');

/* auth route */
Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/register', [AuthController::class, 'store'])->name('register.store');

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/* post route */
Route::get('/post/{post}', [PostController::class, 'show'])->name('posts.show');

Route::post('/post', [PostController::class, 'store'])->name('posts.store')->middleware('auth');

Route::get('/post/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

Route::put('/post/{post}', [PostController::class, 'update'])->name('posts.update');

Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::post('/post/{post}/comments', [CommentController::class, 'store'])->name('posts.comments.store')->middleware('auth');

/* profile route */
Route::get('/profile/{user}', [UserController::class, 'profile'])->name('profile')->middleware('auth');

/* users route */
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('auth');

Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update')->middleware('auth');
