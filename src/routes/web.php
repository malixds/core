<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReviewController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;

use App\Models\Post;
use App\Models\User;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $user = auth()->user();
    $posts = Post::get();
    $users = User::get();
    // dd($users->roles);
    return view('pages.welcome', [
        'user' => $user,
        'posts' => $posts,
        'users' => $users
    ]);
})->name('main');


// Route::get('/profile/orders')
Route::get('/profile/{id}', [ProfileController::class, 'profile'])->name('user.profile');
Route::get('/profile/form/{id}', [ProfileController::class, 'formCreateShow'])
//    ->middleware('user.check')
    ->name('user.profile-form');
Route::post('/profile/form/{id}', [ProfileController::class, 'formCreate'])->name('user.profile-form-create');
Route::post('/delete/subject/{id}', [ProfileController::class, 'formDeleteSubject'])->name('user.profile-form-delete-subject');
Route::get('/profile/settings/{user}', [ProfileController::class, 'profileSettings'])->name('user.profile-settings');
Route::post('/profile/settings/password/{user}', [ProfileController::class, 'profileSettingsPassword'])->name('user.profile-settings-password');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/posts', [PostController::class, 'posts'])->name('post.show');
Route::post('/posts/search', [PostController::class, 'postSearch'])->name('post.search');

// Route::get('/posts/search', [PostController::class, 'showPostSearch'])->name('post.search-show');


Route::get('/posts/full/{id}', [PostController::class, 'postFull'])->name('post.show-full');


Route::get('/posts/create', [PostController::class, 'postCreateShow'])->name('post.create-show');
Route::post('/posts/create', [PostController::class, 'postCreate'])->name('post.create');

Route::get('/posts/edit/{id}', [PostController::class, 'postEditShow'])->name('post.edit-show');
Route::post('/posts/edit/{id}', [PostController::class, 'postEdit'])->name('post.edit');

Route::post('/posts/delete/{id}', [PostController::class, 'postDelete'])->name('post.delete');

Route::put('/posts/accept/{post}', [PostController::class, 'postAccept'])
    ->middleware('user.check')
    ->name('post.accept');

Route::post('/posts/reject/{post}/{executorId?}', [PostController::class, 'postReject'])->name('post.reject');
Route::post('/posts/agree/{post}/{executorId?}', [PostController::class, 'postAgree'])->name('post.agree');
Route::post('/posts/confirm/{post}/{executorId?}', [PostController::class, 'postConfirm'])->name('post.confirm');

// Route::get('/posts/search', [PostController::class, 'postSearch'])->name('post.search');


Route::get('/executors', [ProfileController::class, 'executors'])->name('executors');
Route::post('/executors/search', [ProfileController::class, 'executorSearch'])->name('executor.search');
Route::get('/executor/{id}', [ProfileController::class, 'executorProfile'])->name('executor.profile');


ROute::post('/review/send/{executor}', [ReviewController::class, 'reviewSend'])->name('review.send');


//Route::get('/inbox/{id}', [ProfileController::class, 'inbox'])->name('user.inbox');

Route::get('/chats', [ChatController::class, 'chats'])->name('chats');
Route::get('/chat/create/{post}/{executorId?}', [ChatController::class, 'chatCreate'])->name('chat.create');
Route::get('/chat/{id}', [ChatController::class, 'chat'])->name('chat');
Route::get('/chat/messages/{chat}', [ChatController::class, 'chatMessages'])->name('chat.messages');
Route::post('/chat/send/{id}', [ChatController::class, 'chatSend'])->name('chat.send');


Route::get('/test/maxim', [ProfileController::class, 'testMaxim'])->name('test.maxim');
Route::get('/test/oleg', [ProfileController::class, 'testOleg'])->name('test.oleg');


Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('main');
})->name('user.logout');


require __DIR__ . '/auth.php';
