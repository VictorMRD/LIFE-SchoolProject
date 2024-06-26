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


Route::get('/', [UserController::class, 'index'])->name('index');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/index', [UserController::class, 'index'])->name('index');
Route::get('/votaciones', [UserController::class, 'votaciones'])->name('votaciones');
Route::get('/frases', [UserController::class, 'frases'])->name('frases');
Route::get('/paravotar', [UserController::class, 'paravotar'])->name('paravotar');
Route::get('/user-profile', [UserController::class, 'user_profile'])->name('user_profile');
Route::get('/administrator', [UserController::class, 'administrator'])->name('administrator');

/* Sera mi index, no necesito de una chat controller porque lo hare en el index, creo? */
/* Route::get('/chat', 'ChatController@index')->name('chat'); */

Route::post('/register-form', [FormController::class, 'register'])->name('register-form');
Route::get('/login-form', [FormController::class, 'login'])->name('login-form');
Route::post('/logout-form', [FormController::class, 'logout'])->name('logout-form');

//chats
Route::get('/chat', [App\Http\Controllers\ChatsController::class, 'index']);
Route::get('/messages', [App\Http\Controllers\ChatsController::class, 'fetchMessages']);
Route::post('/messages', [App\Http\Controllers\ChatsController::class, 'sendMessage']);
