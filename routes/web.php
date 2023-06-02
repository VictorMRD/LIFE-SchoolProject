<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FormController;

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

Route::get('/index', [UserController::class, 'index'])->name('index');
Route::get('/login', [UserController::class, 'login'])->name('login');

/* Sera mi index, no necesito de una chat controller porque lo hare en el index, creo? */
/* Route::get('/chat', 'ChatController@index')->name('chat'); */

Route::post('/register-form', [FormController::class, 'register'])->name('register-form');
Route::get('/login-form', [FormController::class, 'login'])->name('login-form');
Route::post('/logout-form', [FormController::class, 'logout'])->name('logout-form');

//chats
Route::get('/chat', [App\Http\Controllers\ChatsController::class, 'index']);
Route::get('/messages', [App\Http\Controllers\ChatsController::class, 'fetchMessages']);
Route::post('/messages', [App\Http\Controllers\ChatsController::class, 'sendMessage']);
