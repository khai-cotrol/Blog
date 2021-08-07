<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\UserController;
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
    return view('customer.login');
});
Route::get('/login', [LoginController::class, 'showFormLogin'])->name('formLogin');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/register', [LoginController::class, 'showFormRegister'])->name('formRegister');
Route::post('/register', [LoginController::class, 'register'])->name('register');
Route::get('/auth/google', [SocialController::class,'redirect'])->name('auth.google');
Route::get('/auth/google/callback', [SocialController::class, 'callback']);


Route::middleware('auth')->group(function () {

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::prefix('/low-budget')->group(function () {
        Route::get('/', [\App\Http\Controllers\ProductController::class, 'index'])->name('product.list');
        Route::get('/create', [\App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
        Route::post('/create', [\App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
        Route::get('/delete/{id}', [\App\Http\Controllers\ProductController::class, 'destroy'])->name('product.delete');
        Route::get('/category/{id}',[\App\Http\Controllers\ProductController::class,'productByCate'])->name('productByCate');
        Route::get('/product/{id}',[\App\Http\Controllers\ProductController::class,'productOfUser'])->name('productOfUser');
    });

    Route::post('/post', [PostController::class, 'post'])->name('status.post');
    Route::post('/comment', [CommentController::class, 'comment'])->name('status.comment');
    Route::get('/status/{id}', [CommentController::class, 'index'])->name('commentByPost');
    Route::get('/delete/{id}', [CommentController::class, 'destroy'])->name('comment.destroy');

    Route::get('/home', [PostController::class, 'index'])->name('home');

    Route::prefix('user')->group(function () {
        Route::get('list', [UserController::class, 'index'])->name('user.list');
        Route::get('adduser', [UserController::class, 'create'])->name('user.adduser');
        Route::post('create', [UserController::class, 'store'])->name('user.create');
        Route::get('edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::get('{id}/delete', [UserController::class, 'destroy'])->name('user.delete');
        Route::get('{id}/profile', [UserController::class, 'show'])->name('user.profile');
    });
});


