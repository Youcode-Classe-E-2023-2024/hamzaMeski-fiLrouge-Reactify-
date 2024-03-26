<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\AQuestionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\QuestionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('front-page');
});

/* auth route */
Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/register', [AuthController::class, 'store'])->name('register.store');

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate');

//Route::delete('/user/delete', [AuthController::class, 'destroy'])->name('user.delete');

/* forget-password route */
Route::get('/forget-password', [ForgetPasswordController::class, 'forgetPassword'])->name('forget.password');

Route::post('/forget-password', [ForgetPasswordController::class, 'forgetPasswordPost'])->name('forget.password.post');

Route::get('/reset-password/{token}', [ForgetPasswordController::class, 'resetPassword'])->name('reset.password');

Route::post('/reset-password', [ForgetPasswordController::class, 'resetPasswordPost'])->name('reset.password.post');

/* main route */
Route::get('/main', [HomeController::class, 'Q_items'])->name('main');

/* question item route */
Route::get('/question-details/{question}', [HomeController::class, 'Q_item_details'])->name('question-details');

/* ask-question route */
Route::get('/ask-question', [AQuestionController::class, 'show'])->name('ask-question.show');

Route::post('/ask-question/store', [AQuestionController::class, 'store'])->name('ask-question.store');

/* answer a question route */
Route::post('/answer-question/{question}/store', [AnswerController::class, 'store'])->name('answer-question.store');

/* like question controller */
Route::post('/like-question/{question}', [QuestionController::class, 'like_question'])->name('like_question');
Route::post('/dislike-question/{question}', [QuestionController::class, 'dislike_question'])->name('dislike_question');

