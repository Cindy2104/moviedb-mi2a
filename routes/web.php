<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CategoryController;


Route::get('/', [MovieController::class, 'homepage']);
Route::get('movie/{id}/{slug}', [MovieController::class, 'detail']);

Route::get('create-movie', [MovieController::class, 'create'])->name('createMovie')->middleware('auth');

Route::post('/movie', [MovieController::class, 'store'])->middleware('auth');

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/data-movie', [MovieController::class, 'dataMovie']);
