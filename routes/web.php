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
Route::get('/category',[CategoryController::class,'index']);
Route::get('/category/{id}',[CategoryController::class,'show']);
Route::get('/good',[GoodController::class,'index']);
