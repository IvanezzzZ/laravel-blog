<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\Authenticate;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
// */

Route::prefix('admin')->middleware([Authenticate::class, AdminMiddleware::class, EnsureEmailIsVerified::class])->group(function () {
    Route::get('/', MainController::class)->name('admin.main');

    Route::prefix('categories')->controller(CategoryController::class)->group(function (){
        Route::get('/', 'index')->name('admin.category.index');
        Route::get("/create", 'create')->name('admin.category.create');
        Route::post("/", 'store')->name('admin.category.store');
        Route::get("/{category}", 'show')->name('admin.category.show');
        Route::get("/{category}/edit", 'edit')->name('admin.category.edit');
        Route::patch("/{category}", 'update')->name('admin.category.update');
        Route::delete("/{category}", 'destroy')->name('admin.category.destroy');
    });

    Route::prefix('tags')->controller(TagController::class)->group(function (){
        Route::get('/', 'index')->name('admin.tag.index');
        Route::get("/create", 'create')->name('admin.tag.create');
        Route::post("/", 'store')->name('admin.tag.store');
        Route::get("/{tag}", 'show')->name('admin.tag.show');
        Route::get("/{tag}/edit", 'edit')->name('admin.tag.edit');
        Route::patch("/{tag}", 'update')->name('admin.tag.update');
        Route::delete("/{tag}", 'destroy')->name('admin.tag.destroy');
    });

    Route::prefix('posts')->controller(PostController::class)->group(function (){
        Route::get('/', 'index')->name('admin.post.index');
        Route::get("/create", 'create')->name('admin.post.create');
        Route::post("/", 'store')->name('admin.post.store');
        Route::get("/{post}", 'show')->name('admin.post.show');
        Route::get("/{post}/edit", 'edit')->name('admin.post.edit');
        Route::patch("/{post}", 'update')->name('admin.post.update');
        Route::delete("/{post}", 'destroy')->name('admin.post.destroy');
    });

    Route::prefix('users')->controller(UserController::class)->group(function (){
        Route::get('/', 'index')->name('admin.user.index');
        Route::get("/create", 'create')->name('admin.user.create');
        Route::post("/", 'store')->name('admin.user.store');
        Route::get("/{user}", 'show')->name('admin.user.show');
        Route::get("/{user}/edit", 'edit')->name('admin.user.edit');
        Route::patch("/{user}", 'update')->name('admin.user.update');
        Route::delete("/{user}", 'destroy')->name('admin.user.destroy');
    });
});

Auth::routes(['verify' => true]);