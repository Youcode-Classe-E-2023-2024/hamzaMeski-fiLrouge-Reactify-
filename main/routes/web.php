<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;

/* main route */
Route::get('/', [MainController::class, 'index'])->name('main');

/* auth route */
Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/register', [AuthController::class, 'store'])->name('register.store');

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/* post route */
Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');

Route::post('/post/{post}', [PostController::class, 'store'])->name('post.store');

Route::get('/post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');

Route::put('/post/{post}', [PostController::class, 'update'])->name('post.update');

Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('post.destroy');
