<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\AdminController;

/*
|--------------------------------------------------------------------------
| dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('dashboard.layout');
// });
// ,'Middleware'=>'auth'
Auth::routes();

// Route::get('/', function () { return view('dashboard.layout'); });
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'],function () {

    Route::get('/', function () { return view('dashboard.home'); });

    Route::delete('delete-post/{id}',[AdminController::class,'deletePost'])->name('delete-post');

    Route::group(['middleware'=>'isAuther'],function(){


    Route::get('index',[AdminController::class,'index'])->name('index');
    Route::post('store-post',[AdminController::class,'storePost'])->name('store-post');
    Route::get('edit-post/{id}',[AdminController::class,'editPost'])->name('edit-post');
    Route::post('update-post/{id}',[AdminController::class,'updatePost'])->name('update-post');

    });
    
});



Route::get('/all-posts',[AdminController::class,'showPosts'])->name('all-posts');
Route::get('show-post/{id}',[AdminController::class,'showPost'])->name('show-post');

