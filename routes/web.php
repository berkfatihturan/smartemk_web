<?php

use Illuminate\Support\Facades\Route;

Route::post('/storemessage', [\App\Http\Controllers\HomeController::class, 'storemessage'])->name("storemessage");

Route::prefix('/')->name("home_")->controller(\App\Http\Controllers\HomeController::class)->group(function () {

    Route::get('/', 'index2')->name('index');
    Route::get('/ckeditor/{type}/{id}','ckeditor')->name('ckeditor');
    Route::get('/aboutus','aboutus')->name('aboutus');
    Route::get('/contactus','contactus')->name('contactus');
    Route::get('/referanslar','referanslar')->name('referanslar');


    Route::prefix('/blogs')->name("blogs_")->controller(\App\Http\Controllers\BlogController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/show/{id}', 'show')->name('show');
    });

    /* Admin Profile Panel Routes*/
    Route::prefix('/brands')->name("brands_")->controller(\App\Http\Controllers\ProductController::class)->group(function () {
        Route::get('/index/{id}', 'index')->name('index');
        Route::get('/sorters', 'sorters')->name('sorters');
        Route::get('/mdr', 'mdr')->name('mdr');
        Route::get('/controller', 'controller')->name('controller');
    });

    Route::prefix('/products')->name("products_")->controller(\App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('/show/{id}', 'homeShow')->name('show');
    });



    Route::get('/deneme', 'deneme')->name('deneme');
});




Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->prefix('admin')->name("admin_")->group(function () {

    Route::get('/home', [AdminHomeController::class, 'index'])->name('index');
    Route::get('/search/{key}', [AdminHomeController::class, 'search'])->name('search');
    Route::post('/advanced_search/{keyword}', [AdminHomeController::class, 'advanced_search'])->name('advanced_search');
    Route::get('/searchPage', [AdminHomeController::class, 'searchPage'])->name('searchPage');
    Route::get('/searchPage/mini', [AdminHomeController::class, 'searchPage_mini'])->name('searchPage_mini');

    Route::prefix('/pages')->name("pages_")->controller(\App\Http\Controllers\Admin\PagesController::class)->group(function () {

        Route::get('/index', 'index')->name('index');
        Route::post('/create', 'create')->name('create');

    });

    /* Admin Profile Panel Routes*/
    Route::prefix('/blogs')->name("blogs_")->controller(\App\Http\Controllers\Admin\BlogController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });

    /* Admin Profile Panel Routes*/
    Route::prefix('/brands')->name("brands_")->controller(\App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('/', 'brandsIndex')->name('index');
        Route::get('/create', 'brandsCreate')->name('create');
        Route::post('/store', 'brandsStore')->name('store');
        Route::get('/edit/{id}', 'brandsEdit')->name('edit');
        Route::post('/update/{id}', 'brandsUpdate')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });

    /* Admin Profile Panel Routes*/
    Route::prefix('/products')->name("products_")->controller(\App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });


    /* Admin User Panel Routes*/
    Route::prefix('/users')->name("user_")->controller(\App\Http\Controllers\Admin\AdminUserController::class)->group(function () {

        Route::get('/index', 'index')->name('index');
        /* -edit- */
        Route::get('/edit/{id}', 'edit')->name('edit');
        /* -show- */
        Route::get('/show/{id}', 'show')->name('show');
        /* -update- */
        Route::post('/update/{id}', 'update')->name('update');
        /* -delete- */
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });

    /* Admin Profile Panel Routes*/
    Route::prefix('/profile')->name("profile_")->controller(\App\Http\Controllers\Admin\AdminProfileController::class)->group(function () {
        Route::get('/', 'index')->name('index');
    });

    /* Admin Message Panel Routes*/
    Route::prefix('/messages')->name("message_")->controller(\App\Http\Controllers\Admin\MessageController::class)->group(function () {

        Route::get('/index', 'index')->name('index');
        /* -show- */
        Route::get('/show/{id}', 'show')->name('show');
        /* -show- */
        Route::get('/show/{id}/updated', 'showWithoutUpdate')->name('show_updated');
        /* -update- */
        Route::post('/update/{id}', 'update')->name('update');
        /* -delete- */
        Route::get('/destroy/{id}', 'destroy')->name('destroy');

    });

    /* Admin Settings Panel Routes*/
    Route::prefix('/settings')->name("settings_")->controller(\App\Http\Controllers\Admin\AdminSettingsController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/update', 'update')->name('update');
    });
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
