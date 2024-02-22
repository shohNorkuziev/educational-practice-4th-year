<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ImageController;
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
Route::post('signup', [UserController::class, 'store']);
Route::post('login', [UserController::class, 'login']);
Route::get('users/{user}', [UserController::class, 'show']);
Route::get('users',[UserController::class, 'index']);
Route::middleware('auth:sanctum')->group(function(){
    Route::patch('update/{user}',[UserController::class, 'update']);
    Route::delete('delete/{user}',[UserController::class, 'destroy']);
});



//Действия с тегами (в будущем будут доступны только администраторам):

Route::apiResource('tags', TagController::class)->only(['store', 'index', 'update', 'destroy']);



//Действия с рекламными предложениями:
Route::apiResource('ad', AdController::class);

//Создание отклика на рекламное предложение
Route::post('application', [ApplicationController::class, 'store']);

//Чат
Route::get('messages', [MessageController::class, 'index']);
Route::get('messages/{message}',[MessageController::class, 'show']);
Route::post('messages', [MessageController::class, 'store']);

Route::apiResource('/images', ImageController::class)->only('store');
Route::get('/download/images/{image}',[ImageController::class,'download']);
