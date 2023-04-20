<?php

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

use Illuminate\Support\Facades\Route;
use Modules\Blog\Http\Controllers\BlogController;
use Modules\BlogPage\Http\Controllers\AboutUsController;
use Modules\BlogPage\Http\Controllers\HomesController;
use Modules\BlogPage\Http\Controllers\PostsController;
use Modules\BlogPage\Http\Controllers\SettingController;
use Modules\BlogPage\Http\Controllers\TagController;

Route::prefix('blogpage')->group(function () {
    Route::get('/', 'BlogPageController@index');
});

Route::middleware(['auth'])->prefix('admin')->group(
    function () {
        Route::prefix('tags')->as('tag.')->group(function () {
            Route::get('/', [TagController::class, 'index'])->name('index');
            Route::post('/', [TagController::class, 'store'])->name('store');
            Route::put('/update/{tag}', [TagController::class, 'update'])->name('update');
            Route::delete('/delete/{tag}', [TagController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('posts')->as('post.')->group(function () {
            Route::get('/', [PostsController::class, 'index'])->name('index');

            Route::get('/create', [PostsController::class, 'create'])->name('create');
            Route::get('/edit/{post}', [PostsController::class, 'edit'])->name('edit');
            Route::post('/', [PostsController::class, 'store'])->name('store');
            Route::post('/update/{post}', [PostsController::class, 'update'])->name('update');
            Route::delete('/delete/{post}', [PostsController::class, 'destroy'])->name('destroy');
            Route::post('/changeState', [PostsController::class, 'changeState'])->name('changeState');
            Route::post('/changeOutstanding', [PostsController::class, 'changeOutstanding'])->name('changeOutstanding');
            Route::post('/deletePosts', [PostsController::class, 'deletePosts'])->name('deletePosts');
        });

        Route::prefix('setting')->as('setting.')->group(function () {
            Route::get('/', [SettingController::class, 'index'])->name('index');

            Route::post('', [SettingController::class, 'store'])->name('store');
        });


        Route::prefix('about-us')->as('about-us.')->group(function () {
            Route::get('/', [AboutUsController::class, 'index'])->name('index');

            Route::post('', [AboutUsController::class, 'store'])->name('store');
        });

        Route::prefix('home')->as('home.')->group(function () {
            Route::get('/', [HomesController::class, 'index'])->name('index');
            Route::post('', [HomesController::class, 'store'])->name('store');
            Route::post('update/{home}', [HomesController::class, 'update'])->name('update');
            Route::delete('delete/{home}', [HomesController::class, 'destroy'])->name('destroy');
            Route::post('changeActive', [HomesController::class, 'changeActive'])->name('changeActive');
            Route::post('priority', [HomesController::class, 'priority'])->name('priority');
            
        });
    }
);
