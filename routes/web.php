<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\GoodController;
use \App\Http\Controllers\OrderController;
use \App\Http\Controllers\LoginController;
use \App\Http\Controllers\ReviewController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello',function (){
    return view('hello',['title' => 'Hello world!']);
});
// Категории
Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category/{id}', [CategoryController::class, 'show']);

// Товары
Route::get('/good', [GoodController::class, 'index']);
Route::get('/good/create', [GoodController::class, 'create'])->middleware('auth');
Route::post('/good', [GoodController::class, 'store']);
Route::get('/good/edit/{id}',[GoodController::class,'edit'])->middleware('auth');
Route::post('/good/update/{id}', [GoodController::class, 'update'])->middleware('auth');
Route::get('/good/destroy/{id}', [GoodController::class, 'destroy'])->middleware('auth');

//Заказы
Route::get('/order/{id}',[OrderController::class,'show']);

//Аутенфикация
Route::get('/login',[LoginController::class,'login'])->name('login');
Route::get('/logout',[LoginController::class,'logout']);
Route::post('/auth',[LoginController::class,'authenticate']);

//Сообщение об ошибке
Route::get('/error',function (){
   return view('error',['message' => session('message')]);
});

//отзывы
Route::post('/good/review/{id}',[ReviewController::class, 'store']);
Route::get('/good/review/{id}',[ReviewController::class,'show']);
Route::get('good/review/{id}/create',[ReviewController::class,'create']);
