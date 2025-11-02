<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('pages.welcome');});

Route::middleware("auth")->group(function () {
    Route::put('todos/{todo}/check', [TodoController::class, 'check'])->name('todos.check');
    Route::resource('categories', CategoryController::class);
    Route::resource("todos", TodoController::class);
    Route::post('logout', [AuthenticatedSessionController::class, 'logout'])->name('logout');
});

Route::middleware("guest")->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('login', [AuthenticatedSessionController::class, 'login'])->name('login.store');
    Route::post('register', [RegisteredUserController::class, 'register'])->name('register.store');
});

