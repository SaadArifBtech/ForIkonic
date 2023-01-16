<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\FriendRequestController;
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
    return view('main');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/suggestion', [App\Http\Controllers\SuggestionController::class, 'index'])->name('suggestion');

Route::get('/friends', [App\Http\Controllers\FriendController::class,'index'])->name('friends.index');
Route::delete('/friends/{friend}', [App\Http\Controllers\FriendController::class,'removeFriend'])->name('friends.remove');

Route::get('/friend-requests', [App\Http\Controllers\FriendController::class,'index'])->name('friend-requests.index');
Route::post('/friend-requests/{request}/accept', [App\Http\Controllers\FriendRequestController::class,'accept'])->name('friend-requests.accept');
Route::delete('/friend-requests/{request}/reject', [App\Http\Controllers\FriendRequestController::class,'reject'])->name('friend-requests.reject');

Route::get('/suggestions', [App\Http\Controllers\SuggestionController::class,'index'])->name('suggestions.index');
Route::post('/suggestions/{suggestion}/accept', [App\Http\Controllers\SuggestionController::class,'accept'])->name('suggestions.accept');
Route::delete('/suggestions/{suggestion}/reject', [App\Http\Controllers\SuggestionController::class,'reject'])->name('suggestions.reject');