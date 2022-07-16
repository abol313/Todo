<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ThemeController;
use Illuminate\Support\Facades\Auth;
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

Route::redirect('/','/todos');
Route::get('/theme',[ThemeController::class,'setTheme'])->name('theme');
Route::get('/todos/filter',[TodoController::class,'filterIndex'])->name('todos.filter');
Route::resource('todos',TodoController::class);
Route::resource('categories',CategoryController::class);

//Authentications
Route::name('auth.')->group(function()
    {
        Route::get('/register',[AuthController::class,'register'])->name('register');
        Route::get('/login',[AuthController::class,'login'])->name('login');
        Route::post('/signup',[AuthController::class,'signup'])->name('signup');
        Route::post('/signin',[AuthController::class,'signin'])->name('signin');
    }
);