<?php

use App\Http\Controllers\Auth\CategoryController;
use App\Http\Controllers\Auth\CommentController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\HomeController;
use App\Http\Controllers\Auth\PostController;
use App\Http\Controllers\Auth\TagController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\site\BlogController;
use App\Http\Controllers\site\CommentController as SiteCommentController;
use App\Http\Controllers\site\IndexController;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();
Route::middleware(['auth', 'admin'])->group(function(){
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('dashboard/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('dashboard/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('dashboard/category/create', [CategoryController::class, 'store'])->name('category.store');
Route::DELETE('dashboard/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

Route::get('dashboard/tag', [TagController::class, 'index'])->name('tag.index');
Route::get('dashboard/tag/create', [TagController::class, 'create'])->name('tag.create');
Route::post('dashboard/tag/create', [TagController::class, 'store'])->name('tag.store');
Route::DELETE('dashboard/tag/{id}', [TagController::class, 'destroy'])->name('tag.destroy');

Route::get('/dashboard/post', [PostController::class, 'index'])->name('post.index');
Route::get('/dashboard/post/create', [PostController::class, 'create'])->name('post.create');
Route::post('dashboard/post/create', [PostController::class, 'store'])->name('post.store');
Route::get('dashboard/postedit/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::patch('dashboard/postedit/{id}', [PostController::class, 'update'])->name('post.update');
Route::delete('dasdoard/post/{id}', [PostController::class, 'delete'])->name('post.delete');
Route::get('dasdoard/user', [UserController::class, 'index'])->name('user.index');
Route::patch('dasdoard/user/{id}/edit', [UserController::class, 'update'])->name('user.update');
Route::get('dasdoard/user/profile', [UserController::class, 'profile'])->name('user.profile');
Route::get('dasdoard/user/profile/{id}/edit', [UserController::class, 'editprofile'])->name('edit.profile');

Route::patch('dasdoard/user/pro/{id}', [UserController::class, 'updateprofile'])->name('update.profile');
Route::delete('dasdoard/user/profile/{id}', [UserController::class, 'destroy'])->name('delete.user');


Route::get('dasdoard/comment', [CommentController::class, 'index'])->name('comment.index');
Route::patch('dasdoard/comment/{id}', [CommentController::class, 'update'])->name('comment.update');
Route::delete('dasdoard/comment/{id}', [CommentController::class, 'commentdestroy'])->name('comment.destroy');

Route::get('dasdoard/commentreplay', [CommentController::class, 'replayindex'])->name('commentreplay.index');
Route::patch('dasdoard/commentreplay/{id}', [CommentController::class, 'replayupdate'])->name('commentreplay.update');
Route::delete('dasdoard/commentreplay/{id}', [CommentController::class, 'destroy'])->name('commentreply.destroy');
});


// Site Routes
Route::get('/', [IndexController::class, 'index'])->name('site.index');
Route::get('/category/{category:slug}', [IndexController::class, 'categorypost'])->name('category.post');


Route::get('/{post:slug}', [BlogController::class, 'blogpage'])->name('blog.page');
Route::get('/tag/{tag:slug}', [BlogController::class, 'tagpost'])->name('tag.post');

Route::post('/post/comment/{postId}', [SiteCommentController::class, 'store'])->name('comment.store')->middleware('auth');
Route::post('/comment/reply/{commentId}', [SiteCommentController::class, 'commentreplystore'])->name('commentreply.store')->middleware('auth');
