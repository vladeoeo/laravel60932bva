<?php

use \App\Http\Controllers\CategoryControllerApi;
use \App\Http\Controllers\GoodControllerApi;
use \App\Http\Controllers\ReviewControllerApi;
use \Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\OrderControllerApi;

use Illuminate\Http\Request;

Route::get('/category_total',[CategoryControllerApi::class,'total']);
Route::get('/category',[CategoryControllerApi::class,'index']);
Route::get('/category/{id}',[CategoryControllerApi::class,'show']);
Route::get('/good_total',[GoodControllerApi::class,'total']);
Route::get('/good',[GoodControllerApi::class,'index']);
Route::get('/good/{id}',[GoodControllerApi::class,'show']);
Route::get('/review',[ReviewControllerApi::class,'index']);
Route::get('/review/{id}',[ReviewControllerApi::class,'show']);
Route::post('/login',[AuthController::class,'login']);
Route::middleware('auth:sanctum')->get('/order',[OrderControllerApi::class,'index']);
Route::middleware('auth:sanctum')->get('/logout',[AuthController::class,'logout']);

Route::group(['middleware'=>['auth:sanctum']],function (){
   Route::get('/order',[OrderControllerApi::class,'index']);
   Route::get('/user',function (Request $request){
       return $request->user();
   });
    Route::get('/logout',[AuthController::class,'logout']);
});
