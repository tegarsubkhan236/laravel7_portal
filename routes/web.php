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
Route::get("/logout", "Auth@logout")->name('logout');

Route::get('/profile', 'User@profile')->middleware("gateway:1|2|3")->name('profile');
Route::post("/profile/update", "User@profile_update")->name("profile.update");

Route::prefix("/administrator")->namespace("Admin")->middleware('gateway:1')->group(function () {
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

<<<<<<< HEAD
    Route::get("/image_gallery", "Pages@image_gallery_index")->name("image_gallery");
    Route::get("/image_gallery/create", "Pages@image_gallery_create")->name("image_gallery.create");
    Route::post("/image_gallery/store", "System@image_gallery_store")->name("image_gallery.store");
    Route::get("/image_gallery/edit/{id}", "Pages@image_gallery_edit")->name("image_gallery.edit");
    Route::post("/image_gallery/update/{id}", "System@image_gallery_update")->name("image_gallery.update");
    Route::delete("/image_gallery/delete/{id}", "System@image_gallery_delete")->name("image_gallery.delete");

    Route::get("/video_gallery", "Pages@video_gallery_index")->name("video_gallery");
    Route::get("/video_gallery/create", "Pages@video_gallery_create")->name("video_gallery.create");
    Route::post("/video_gallery/store", "System@video_gallery_store")->name("video_gallery.store");
    Route::get("/video_gallery/edit/{id}", "Pages@video_gallery_edit")->name("video_gallery.edit");
    Route::post("/video_gallery/update/{id}", "System@video_gallery_update")->name("video_gallery.update");
    Route::delete("/video_gallery/delete/{id}", "System@video_gallery_delete")->name("video_gallery.delete");
});

Route::prefix("/author")->namespace("Author")->middleware('gateway:2')->group(function () {
=======
    Route::get("/portfolio", "Pages@portfolio_index")->name("portfolio");
    Route::get("/portfolio/create", "Pages@portfolio_create")->name("portfolio.create");
    Route::post("/portfolio/store", "System@portfolio_store")->name("portfolio.store");
    Route::get("/portfolio/edit/{id}", "Pages@portfolio_edit")->name("portfolio.edit");
    Route::post("/portfolio/update/{id}", "System@portfolio_update")->name("portfolio.update");
    Route::delete("/portfolio/delete/{id}", "System@portfolio_delete")->name("portfolio.delete");
});

Route::prefix("/author")->namespace("Author")->group(function () {
>>>>>>> e1cbd417b9d64bbcfb5c2e4e3ca769a5b312d70e
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
