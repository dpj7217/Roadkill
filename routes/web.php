<?php

use Illuminate\Support\Facades\Route;

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
    return view('index');
});

Route::get('/search', [App\Http\Controllers\SearchController::class, 'show']);
Route::post('/search', [App\Http\Controllers\SearchController::class, 'search'])->name('search');

Route::get('/test', function() {
    return view('test');
});

Route::get('/home', [App\Http\Controllers\PostsController::class, 'index'])->name('home');

/* POST ROUTES */
//create new post
Route::get('/post/create', [App\Http\Controllers\CreatePostsController::class, 'show'])->name('showCreatePost')->middleware('auth');
Route::post('/post/create', [App\Http\Controllers\CreatePostsController::class, 'create'])->name('handleCreatePost')->middleware('auth');

//update post
Route::get('/post/update/{post_id}', [App\Http\Controllers\updatePostsController::class, 'show'])->name('showUpdatePost');
Route::patch('/post/update/{post_id}', [App\Http\Controllers\updatePostsController::class, 'update'])->name('handleUpdatePost');

//general post
Route::get('/post/index', [App\Http\Controllers\PostsController::class, 'index'])->name('showAllPosts');
Route::delete('/post/delete/{post_id}', [App\Http\Controllers\PostsController::class, 'delete'])->name('deletePost');
Route::get('/post/{post_id}', [App\Http\Controllers\PostsController::class, 'show'])->name('showPost');

/* USER ROUTES */
//general user
Route::get('/users/{user_id}', [App\Http\Controllers\UserController::class, 'show'])->name('showUserDetails');
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('showAllUsers');//->middleware('admin');



Auth::routes();
