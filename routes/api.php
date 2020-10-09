<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix("v0")->group(function (){
    Route::prefix("announcement")->namespace("API")->group(function (){
        Route::get("/list","Announcement@index");
        Route::get("/detail","Announcement@detail");
    });
    Route::prefix("article")->namespace("API")->group(function (){
        Route::get("/list","Article@index");
        Route::get("/detail","Article@detail");
    });
    Route::prefix("category")->namespace("API")->group(function (){
        Route::get("/list","Category@index");
        Route::get("/detail","Category@detail");
    });
    Route::prefix("menu")->namespace("API")->group(function (){
        Route::get("/list","Menu@index");
        Route::get("/detail","Menu@detail");
    });
    Route::prefix("page")->namespace("API")->group(function (){
        Route::get("/detail","Page@detail");
    });
});
