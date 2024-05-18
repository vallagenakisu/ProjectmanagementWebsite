<?php

use App\Models\Sub;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthManager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardsController;
use App\Http\Controllers\FriendsController;
use App\Http\Controllers\SubtasksController;
use App\Models\User;

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
    return view('welcome');
});


//post 
Route::post('/login',[AuthManager::class, 'loginPost'])->name('login.post'); 
Route::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post');
Route::post('/dashboard/{user}/action', [CardsController::class, 'create'])->name('dashboard.post')->middleware('auth');
Route::post('/dashboard/{user}/cards/{card}/action',[SubtasksController::class, 'create'])->name('subcards.post')->middleware('auth');
Route::post('/dashboard/{user}/cards/{card}/{subtask}/action',[SubtasksController::class, 'createChildren'])->name('subcards.children.post')->middleware('auth');
Route::post('/dashboard/{user}/cards/{card}/{subtask}/update',[SubtasksController::class, 'status'])->name('subcards.update')->middleware('auth');
Route::post('/dashboard/{user}/cards/{card}/{subtask}/delete',[SubtasksController::class, 'delete'])->name('subcards.delete')->middleware('auth');
Route::post('/dashboard/user/{user}/friends/{friend}/add',[FriendsController::class, 'addFriend'])->name('friends.add')->middleware('auth');
Route::post('/dashboard/user/{user}/friends/{friend}/remove',[FriendsController::class, 'removeFriend'])->name('friends.remove')->middleware('auth');

//get

Route::get('/login',[AuthManager::class, 'login'])->name('login');
Route::get('/registration', [AuthManager::class, 'registration']);
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');
Route::get('/users/{user}/create-card', [CardsController::class, 'form'])->name('create')->middleware('auth');
Route::get('/dashboard/{user}', [CardsController::class, 'getcards'])->name('getcards')->middleware('auth');
Route::get('/dashboard/{user}/cards/{card}',[SubtasksController::class, 'getsubtasks'])->name('subcards')->middleware('auth');
Route::get('/dashboard/{user}/cards/{card}/sub-task/{subtask}',[SubtasksController::class, 'subtask_each'])->name('subtaskeach')->middleware('auth');
Route::get('/dashboard/user/{user}',[Controller::class , 'user'])->name('user')->middleware('auth');
Route::get('/dashboard/user/{user}/friends',[FriendsController::class, 'index'])->name('friends')->middleware('auth');
Route::get('/dashboard/user/{user}/myfriends',[FriendsController::class, 'myfriends'])->name('myfriends')->middleware('auth');
Route::get('dashboard/user/{user}/visit/profile/{friends}',[Controller::class, 'visit'])->name('visit')->middleware('auth');
