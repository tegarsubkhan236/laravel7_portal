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
Route::post("/logout", "Auth@logout")->name('logout');

Route::get('/profile/{id}', 'User@profile')->name('profile');
Route::post("/profile/update/{id}", "User@profile_update")->name("profile.update");

Route::prefix("/administrator")->namespace("Admin")->group(function () {
    Route::get("/", "Pages@index")->name("admin.home");

    Route::get("/user", "Pages@user_index")->name("user");
    Route::get("/user/create", "Pages@user_create")->name("user.create");
    Route::post("/user/store", "System@user_store")->name("user.store");
    Route::delete("/user/delete/{id}", "System@user_delete")->name("user.delete");

    Route::get("/announcement", "Pages@announcement_index")->name("announcement");
    Route::get("/announcement/create", "Pages@announcement_create")->name("announcement.create");
    Route::post("/announcement/store", "System@announcement_store")->name("announcement.store");
    Route::get("/announcement/edit/{id}", "Pages@announcement_edit")->name("announcement.edit");
    Route::post("/announcement/update/{id}", "System@announcement_update")->name("announcement.update");
    Route::delete("/announcement/delete/{id}", "System@announcement_delete")->name("announcement.delete");
});

Route::prefix("/author")->namespace("Author")->group(function () {
    Route::get("/", "Pages@index")->name("author.home");

    Route::get("/category", "Pages@category_index")->name("category");
    Route::get("/category/create", "Pages@category_create")->name("category.create");
    Route::post("/category", "System@category_store")->name("category.store");
    Route::get("/category/edit/{id}", "Pages@category_edit")->name("category.edit");
    Route::post("/category/update/{id}", "System@category_update")->name("category.update");
    Route::delete("/category/delete/{id}", "System@category_delete")->name("category.delete");

    Route::get("/article", "Pages@article_index")->name("article");
    Route::get("/article/create", "Pages@article_create")->name("article.create");
    Route::post("/article", "System@article_store")->name("article.store");
    Route::get("/article/edit/{id}", "Pages@article_edit")->name("article.edit");
    Route::post("/article/update/{id}", "System@article_update")->name("article.update");
    Route::delete("/article/delete/{id}", "System@article_delete")->name("article.delete");
});
