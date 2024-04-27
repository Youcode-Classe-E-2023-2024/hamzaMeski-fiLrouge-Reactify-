<?php

use Illuminate\Support\Facades\Route;

// controllers
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
use App\Http\Controllers\ChatGroupController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProfileController;

// middlewares
use App\Http\Middleware\CheckUserRole;


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


Route::group(['middleware' => ['guest']], function () {
    Route::get('/', function () {
        return view('front-page');
    })->name('front-page');

    /* auth route */
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'store'])->name('register.store');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate');

    /* forget-password route */
    Route::get('/forget-password', [ForgetPasswordController::class, 'forgetPassword'])->name('forget.password');
    Route::post('/forget-password', [ForgetPasswordController::class, 'forgetPasswordPost'])->name('forget.password.post');
    Route::get('/reset-password/{token}', [ForgetPasswordController::class, 'resetPassword'])->name('reset.password');
    Route::post('/reset-password', [ForgetPasswordController::class, 'resetPasswordPost'])->name('reset.password.post');
});


/* about us route */
Route::get('/about-us', function() {
    $hover = 'About';
    return view('about.main', compact('hover'));
})->name('about_us');

/* Blog route */
Route::get('/blog-index', [BlogController::class, 'main'])->name('blog-main');

/* article details route */
Route::get('/article-details/{article}', [BlogController::class, 'article_details'])->name('article_details');

/* top questions route */
Route::get('/top-questions', [HomeController::class, 'top_questions'])->name('top_questions');

/* main route */
Route::get('/home', [HomeController::class, 'Q_items'])->name('main');


Route::group(['middleware' => ['auth']], function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    /* question item route */
    Route::get('/question-details/{question}', [HomeController::class, 'Q_item_details'])->name('question-details');

    /* ask-question route */
    Route::get('/ask-question', [AQuestionController::class, 'show'])->name('ask-question.show');
    Route::post('/ask-question/store', [AQuestionController::class, 'store'])->name('ask-question.store');

    /* store comment route */
    Route::post('/comment-on-answer/{answer}', [CommentController::class, 'store']);

    /* get comments route */
    Route::get('/comments-of-answer/{answer}', [CommentController::class, 'get_comments']);

    /* update comment route */
    Route::post('/update-comment/{comment}', [CommentController::class, 'update']);

    /* AI route */
    Route::get('/execute-script', [AIController::class, 'executeCommands']);

    /* top users route */
    Route::get('/top-users', [UserController::class, 'get_top_users'])->name('get_top_users');

    /* top user details route */
    Route::get('/top-user-details/{user}', [UserController::class, 'get_top_user_details'])->name('get_top_user_details');

    /* chat app route */
    Route::get('/chat-app', [ChatController::class, 'index'])->name('chat');

    Route::get('/chat-app/{receiverId}', [ChatController::class, 'connect_user'])->name('connect_user');

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

    /* suggestions home route */
    Route::get('/suggestions', [FriendController::class, 'suggestions'])->name('suggestions');

    /* all friends home route */
    Route::get('/all-friends-index', [FriendController::class, 'all_friends_index'])->name('all_friends_index');
    Route::get('/all-friends', [FriendController::class, 'all_friends']);

    /* suggestions home route */
    Route::get('/friend-requests-index', [FriendController::class, 'friend_requests_index'])->name('friend_requests_index');
    Route::get('/friend-requests', [FriendController::class, 'friend_requests']);
    Route::post('/accept-friend/{sender}', [FriendController::class, 'accept_friend']);
    Route::delete('/ignore-friend/{sender}', [FriendController::class, 'ignore_friend']);

    /* suggested users route*/
    Route::get('/suggested-users', [FriendController::class, 'suggested_users']);

    /* add friend */
    Route::post('/add-friend/{receiver}', [FriendController::class, 'add_friend']);

    /* remove friend */
    Route::delete('/remove-suggested-friend/{receiver}', [FriendController::class, 'remove_suggested_friend']);

    /* destroy friend */
    Route::delete('/delete-friend/{user}', [FriendController::class, 'delete_friend']);

    /* cancel friend request */
    Route::delete('/cancel-friend-request/{receiver}', [FriendController::class, 'cancel_friend_req']);

    /* block friend */
    Route::post('/block-friend/{user}', [FriendController::class, 'block_friend']);

    /* contact us */
    Route::get('/contact-us', function() {
        $hover = 'Message Us';
        return view('contact-us.main', compact('hover'));
    })->name('contact_us');


    /* json get a question answers */
    Route::get('/question-answers/{question}', [QuestionController::class, 'get_question_answers']);
    Route::post('/answer-question/{question}', [QuestionController::class, 'answer_question']);
    Route::delete('/delete-answer/{answer}', [QuestionController::class, 'delete_answer']);
    Route::post('/update-answer/{answer}', [QuestionController::class, 'update_answer']);


    /* vote a question route */
    Route::post('/like-question/{question}', [QuestionController::class, 'like_question']);
    Route::post('/are-questions-liked', [QuestionController::class, 'are_questions_liked']);

    /* save a question route */
    Route::post('/save-question/{question}', [QuestionController::class, 'save_question']);

    /* vote an answer route */
    Route::post('/like-answer/{answer}', [AnswerController::class, 'like_answer']);

    /* save an answer route */
    Route::post('/save-answer/{answer}', [AnswerController::class, 'save_answer']);

    Route::post('/get-answers-likes', [AnswerController::class, 'get_answers_likes']);

    /* group chat routes */
    Route::get('/chat-group-index', [ChatGroupController::class, 'index'])->name('chat_group_index');

    Route::get('/chat-app/{groupId}', [ChatGroupController::class, 'connect_group'])->name('connect_group');

    Route::post('/send-group-message', [ChatGroupController::class, 'sendGroupMessage']);

    Route::get('/get-group-messages/{groupId}', [ChatGroupController::class, 'get_group_messages']);

    Route::post('/create-group', [ChatGroupController::class, 'create_group']);

    Route::post('/invite-people/{groupId}', [ChatGroupController::class, 'invite_people']);

    Route::get('/groups-requests', [ChatGroupController::class, 'get_groups_request']);

    Route::post('/accept-group-request/{groupId}', [ChatGroupController::class, 'accept_group_request']);

    Route::delete('/refuse-group-request/{groupId}', [ChatGroupController::class, 'refuse_group_request']);

    Route::get('/latest-group-messages/{groupId}', [ChatGroupController::class, 'latest_group_messages']);

    /* blog routes */
    Route::post('/like-blog/{blog}', [BlogController::class, 'like_blog']);

    /* check if a blog is liked */
    Route::post('/is-blog-liked/{blog}', [BlogController::class, 'is_blog_liked']);

    Route::post('/are-blogs-liked', [BlogController::class, 'are_blogs_liked']);


    /********************************/
    /* tags route */
    Route::get('/tags', [HomeController::class, 'get_tags'])->name('get_tags');

    /* tags questions route */
    Route::get('/tags-questions/{id}', [HomeController::class, 'tags_questions'])->name('tags_questions');

    /* saved questions */
    Route::get('/saved-questions-index', [HomeController::class, 'saved_questions'])->name('saved_questions');

    /* saved answers */
    Route::get('/saved-answers-index', [HomeController::class, 'saved_answers_index'])->name('saved_answers_index');


    /* Profile Controller */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/userInfo', [ProfileController::class, 'userInfoUpdate'])->name('profile.userInfo.update');
    Route::put('/profile/password', [ProfileController::class, 'passwordUpdate'])->name('profile.password.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/* roles and permissions */
Route::middleware('auth')->group(function () {
    Route::middleware([CheckUserRole::class . ':admin'])->group(function () {
        Route::get('/admin-users-dash', function() {
            return view('admin.users-dashboard.users-table');
        });
        Route::get('/admin-roles-dash', function() {
            return view('admin.roles-dashboard.roles-table');
        });

        Route::prefix('users')->group(function () {
            Route::get('/', [UserController::class, 'index']);
            Route::post('/', [UserController::class, 'store']);
            Route::get('/{id}', [UserController::class, 'getUserDetails']);
            Route::put('/{id}', [UserController::class, 'update']);
            Route::delete('/{id}', [UserController::class, 'destroy']);
            Route::get('/getUserRolesNames/{id}', [UserController::class, 'getUserRolesNames']);
        });

        Route::prefix('role')->group(function () {
            Route::get('/getRolesNames', [RoleController::class, 'getRolesNames']);
            Route::get('/roles', [RoleController::class, 'roles']);
            Route::get('/getRoleDetails/{id}', [RoleController::class, 'getRoleDetails']);
            Route::get('/getRolePermissionsNames/{id}', [RoleController::class, 'getRolePermissionsNames']);

            Route::post('/storeRole', [RoleController::class, 'storeRole']);
            Route::put('/updateRole/{id}', [RoleController::class, 'updateRole']);
            Route::delete('/deleteRole/{id}', [RoleController::class, 'deleteRole']);

            Route::post('/giveRoleToUser/{roleId}/{userId}', [RoleController::class, 'giveRoleToUser']);
            Route::put('/updateRoleOfUser/{id}', [RoleController::class, 'updateRoleOfUser']);
            Route::delete('/deleteRoleFromUser/{role_id}/{user_id}', [RoleController::class, 'deleteRoleFromUser']);
        });

        Route::prefix('permission')->group(function () {
            Route::get('/getPermissionsNames', [RoleController::class, 'getPermissionsNames']);


            Route::post('/storePermission', [RoleController::class, 'storePermission']);
            Route::put('/updatePermission/{id}', [RoleController::class, 'updatePermission']);
            Route::delete('/deletePermission/{id}', [RoleController::class, 'deletePermission']);

            Route::post('/givePermissionToRole/{roleId}/{userId}', [RoleController::class, 'givePermissionToRole']);
            Route::put('/updatePermissionOfRole/{id}', [RoleController::class, 'updatePermissionOfRole']);
            Route::delete('/deletePermissionFromRole/{role_id}/{user_id}', [RoleController::class, 'deletePermissionFromRole']);
        });
    });
});

