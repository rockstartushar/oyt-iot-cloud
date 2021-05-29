<?php

use Illuminate\Support\Facades\Route;
// use tcg\Voyager;

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

use App\Http\Controllers\IndexController;

Route::get('/index', [IndexController::class, 'index']);
Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello ', function () {
    return 'Hello, World!';
});
Route::get('/user', [UserController::class, 'index']);
Route::get('post/{slug}', [PostController::class, 'show']);
Route::get('user/profile', [UserController::class, 'show'])->name('profile');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
