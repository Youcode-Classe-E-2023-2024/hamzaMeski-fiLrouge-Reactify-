<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\AQuestionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AIController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\FriendController;


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
})->name('front-page');

/* auth route */
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
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

/* vote a question route */
Route::post('/like-question/{question}', [QuestionController::class, 'like_question']);
Route::post('/dislike-question/{question}', [QuestionController::class, 'dislike_question']);

/* vote an answer route */
Route::post('/like-answer/{answer}', [AnswerController::class, 'like_answer']);
Route::post('/dislike-answer/{answer}', [AnswerController::class, 'dislike_answer']);

/* store comment route */
Route::post('/comment-on-answer/{answer}', [CommentController::class, 'store']);

/* get comments route */
Route::get('/comments-of-answer/{answer}', [CommentController::class, 'get_comments']);

/* update comment route */
Route::post('/update-comment/{comment}', [CommentController::class, 'update']);

/* AI route */
Route::get('/execute-script', [AIController::class, 'executeCommands']);

/* Blog route */
Route::get('/blog-main', [BlogController::class, 'main'])->name('blog-main');

/* article details route */
Route::get('/article-details/{article}', [BlogController::class, 'article_details'])->name('article_details');

/* top users route */
Route::get('/top-users', [UserController::class, 'get_top_users'])->name('get_top_users');

/* top user details route */
Route::get('/top-user-details/{user}', [UserController::class, 'get_top_user_details'])->name('get_top_user_details');

/* 3d-landing page */
Route::get('/td-landing', function() {
    return view('3d-landing.main');
})->name('td-landing');

/* chat app route */
Route::get('/chat-app', [ChatController::class, 'index'])->name('chat');

Route::post('/send-message', [ChatController::class, 'sendMessage']);

Route::get('get-friend-messages/{user}', [ChatController::class, 'get_friend_messages']);

/* logged user route */
Route::get('/auth-user', [UserController::class, 'get_logged_user']);

/* get certain user route */
Route::get('/get-user/{user}', [UserController::class, 'get_user']);

/* last inserted message route */
Route::get('/get_last_inserted_message', [ChatController::class, 'get_last_inserted_message']);

/* friends home route */
Route::get('/friends-home', [FriendController::class, 'friends_home'])->name('friends_home');
