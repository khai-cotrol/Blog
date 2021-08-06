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
    return view('layout.master');
});
Route::prefix('/low-budget')->group(function (){
    Route::get('/',[\App\Http\Controllers\ProductController::class,'index'])->name('product.list');
    Route::get('/create',[\App\Http\Controllers\ProductController::class,'create'])->name('product.create');
    Route::post('/create',[\App\Http\Controllers\ProductController::class,'store'])->name('product.store');
    Route::get('/delete/{id}', [\App\Http\Controllers\ProductController::class, 'destroy'])->name('product.delete');

});
