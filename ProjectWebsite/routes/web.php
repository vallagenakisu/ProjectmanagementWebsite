<?php

use App\Http\Controllers\AuthManager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardsController;
use App\Http\Controllers\SubtasksController;
use App\Models\Sub;

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
Route::get('/login',[AuthManager::class, 'login'])->name('login');
Route::post('/login',[AuthManager::class, 'loginPost'])->name('login.post'); 
Route::get('/registration', [AuthManager::class, 'registration']);
Route::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post');
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

Route::post('/dashboard/{user}/action', [CardsController::class, 'create'])->name('dashboard.post')->middleware('auth');
Route::get('/users/{user}/create-card', [CardsController::class, 'form'])->name('create')->middleware('auth');
Route::get('/dashboard/{user}', [CardsController::class, 'getcards'])->name('getcards')->middleware('auth');
Route::get('/dashboard/{user}/cards/{card}',[CardsController::class, 'subcards'])->name('subcards')->middleware('auth');
Route::post('/dashboard/{user}/cards/{card}/action',[SubtasksController::class, 'create'])->name('subcards.post')->middleware('auth');
