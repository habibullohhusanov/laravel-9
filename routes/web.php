<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PostController;
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

/*--Authentication --*/
Route::get('login', [AuthController::class, 'login_view']);
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('register', [AuthController::class, 'register_view']);
Route::post('register', [AuthController::class, 'register'])->name('register');

Route::get('/', function() {
    return view('welcome');
});
Route::resource('photo', PhotoController::class);

Route::get('post', [PostController::class,'index'])->name('post');
Route::get('add', [PostController::class, 'add_view']);
Route::post('add', [PostController::class, 'add'])->name('add');
Route::delete('delete/{id}', [PostController::class,'delete'])->name('delete');