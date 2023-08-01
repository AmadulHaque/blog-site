<?php

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

Route::middleware('auth')->group(function () {
	Route::get('/',[App\Http\Controllers\HomeController::class, 'Home'])->name('Home');
	Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->middleware('auth');

	// post
	Route::post('/post',[App\Http\Controllers\PostController::class, 'Post'])->name('Post');

});
Route::get('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::get('/register', [App\Http\Controllers\AuthController::class, 'register'])->name('register');
Route::post('/registerPost', [App\Http\Controllers\AuthController::class, 'registerPost'])->name('registerPost');
Route::post('/loginPost', [App\Http\Controllers\AuthController::class, 'loginPost'])->name('loginPost');

