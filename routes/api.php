<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Регистрация, вход, пользователи:
Route::post('signup', [UserController::class, 'signup']);
Route::post('login', [UserController::class, 'login']);
Route::get('users/{id}', [UserController::class, 'show']);


//Действия с тегами (в будущем будут доступны только администраторам):

Route::apiResource('tags', TagController::class)->only(['store', 'index', 'update', 'destroy']);



//Действия с рекламными предложениями:
Route::apiResource('applications', ApplicationController::class);

//Создание отклика на рекламное предложение
Route::post('responses', [ResponseController::class, 'store']);

//Чат
Route::get('messages', [MessageController::class, 'index']);
Route::post('messages', [MessageController::class, 'store']);

