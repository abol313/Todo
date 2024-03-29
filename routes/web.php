<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\PasswordConfirmationController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\ThemeController;
use Illuminate\Http\Request;
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
Route::resource('categories',CategoryController::class)->middleware(['auth','auth.session','verified']);

//Authentications
Route::name('auth.')->group(function()
    {
        Route::get('/register',[AuthController::class,'register'])->name('register');
        Route::get('/login',[AuthController::class,'login'])->name('login');
        Route::get('/logout',[AuthController::class,'logout'])->name('logout');
        Route::post('/signup',[AuthController::class,'signup'])->name('signup');
        Route::post('/signin',[AuthController::class,'signin'])->name('signin');
    }
);

//Verfication user email
Route::name('verification.')->prefix('/email')->middleware('auth')->group(function(){
    Route::get('/verify',[EmailVerificationController::class,'notice'])->name('notice');
    Route::get('/verify/{id}/{hash}',[EmailVerificationController::class,'verify'])->name('verify')->middleware('signed');
    Route::post('/verification-notification',[EmailVerificationController::class,'send'])->name('send');
});

//Confirm password
Route::prefix('/password')->name('password.')->middleware(['auth','verified'])->group(function(){
    Route::get('/confirm',[PasswordConfirmationController::class,'confirm'])->name('confirm');
    Route::post('/confirm',[PasswordConfirmationController::class,'verify'])->name('verify')->middleware('throttle:6,1');
});

//Reset password
Route::name('password.')->middleware('guest')->group(function(){
    //Send password reset link
    Route::get('/forgot-password',[PasswordResetController::class,'request'])->name('request');
    Route::post('/forgot-password',[PasswordResetController::class,'email'])->name('email');

    //Reset password
    Route::get('/reset-password/{token}',[PasswordResetController::class,'reset'])->name('reset');
    Route::post('/reset-password',[PasswordResetController::class,'update'])->name('update');
});