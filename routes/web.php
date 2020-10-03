<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect(route("front.home"));
});

Route::prefix("/front")->namespace("Front")->group(function () {
    Route::get("/", "Home@index")->name("front.home");
});

Route::get("/login", "Auth@login_page");
Route::post('/login', "Auth@login")->name('login');

Route::get("/register", "Auth@register_page");
Route::post('/register', "Auth@register")->middleware('gateway')->name('register');

Route::get("/logout", "Auth@logout");

Route::prefix("/administrator")->namespace("Admin")->group(function () {
    Route::get("/", "Pages@index")->name("admin.home");
});
