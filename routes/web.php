<?php

use App\Http\Middleware\Authenticate;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\Person\MainController;
use App\Http\Controllers\Person\LikedController;
use App\Http\Controllers\Person\CommentController;

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
Route::get("/", IndexController::class);

Route::prefix('person')->middleware([Authenticate::class, EnsureEmailIsVerified::class])->group(function(){
    Route::get('/', MainController::class)->name('person.main');

    Route::prefix('liked')->controller(LikedController::class)->group(function(){
        Route::get('/', 'index')->name('person.liked.index');
    });

    Route::prefix('comments')->controller(CommentController::class)->group(function(){
        Route::get('/', 'index')->name('person.comment.index');
    });

});

Auth::routes(['verify' => true]);
