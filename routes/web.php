<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\GoodController;

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
Route::get('/good/create', [GoodController::class, 'create']);
Route::post('/good', [GoodController::class, 'store']);
Route::get('/good/edit/{id}',[GoodController::class,'edit']);
Route::post('/good/update/{id}', [GoodController::class, 'update']);
Route::get('/good/destroy/{id}', [GoodController::class, 'destroy']);
