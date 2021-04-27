<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/',[PagesController::class, 'index'])->name('index');//this last portion for {{ route('______') }}

Route::get('/about',[PagesController::class, 'about'])->name('about');

Route::get('/services',[PagesController::class, 'services'])->name('services');

Route::get('/dashboard',[DashboardController::class, 'index'])
->name('dashboard');
// ->middleware('auth');//add in controller
//{it is also called home in some cases }


Route::get('/register',[RegisterController::class, 'index'])->name('register');
Route::post('/register',[RegisterController::class, 'store']);

Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'store']);

Route::post('/logout',[LogoutController::class, 'store'])->name('logout');

//There is convention for this type of routes //

Route::get('/posts',[PostsController::class, 'index'])->name('posts.index');

Route::get('/posts/create',[PostsController::class, 'create'])->name('posts.create');
Route::post('/posts',[PostsController::class, 'store'])->name('posts.store');

Route::get('/posts/{post}/edit',[PostsController::class, 'edit'])->name('posts.edit');
Route::post('/posts/{post}',[PostsController::class, 'update'])->name('posts.update');
// PUT: www.example.com/user would create a new entity
// PUT: www.example.com/user/{id} would update an existing entity
// POST: www.example.com/user a data-accepting endpoint (such as batch updating where id's are defined in body and not in URI)


Route::delete('/posts/{post}', [PostsController::class, 'destroy'])->name('posts.destroy');

Route::get('/posts/{post}', [PostsController::class, 'show'])->name('posts.show');


//using post or {Post $post} instead of id {$id} is Route Model Binding //dont need $post->id


// Route::post('/posts/{id}/likes',[PostLikeController::class, 'store'])->name('posts.likes');
Route::post('/posts/{post}/likes',[PostLikeController::class, 'store'])->name('posts.likes');
Route::delete('/posts/{post}/likes',[PostLikeController::class, 'destroy'])->name('posts.unlikes');


Route::get('/users/{user:username}/posts', [UserPostController::class, 'index'])->name('users.posts.index');
 