<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CategoryController;

Route::get('/', [MovieController::class, 'homepage']);
Route::resource('/category', CategoryController::class);


