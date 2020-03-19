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

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', function () {
            return view('admin.index');
        })->name('index');

        Route::get('/user', 'Admin\UserController@index')->name('user');
        Route::get('/info',  'Admin\UserController@showChangeInfo')->name('change_info');
        Route::get('/password', 'Admin\UserController@showChangePassword')->name('change_password');

        Route::post('/change_info', 'Admin\UserController@changeInfo')->name('info');
        Route::post('/change_password', 'Admin\UserController@changePassword')->name('password');

        /* Route for category*/
        Route::prefix('category')->name('category.')->group(function () {
            Route::get('/', 'Admin\CategoryController@index')->name('index');
            Route::get('/add', 'Admin\CategoryController@add')->name('add');
            Route::get('/edit/{id_category}', 'Admin\CategoryController@edit')->name('edit');

            Route::post('/create', 'Admin\CategoryController@create')->name('create');
            Route::post('/update/{id_category}', 'Admin\CategoryController@update')->name('update');
            Route::post('/delete/{id_category}', 'Admin\CategoryController@delete')->name('delete');
        });

        /* Route for Post*/
        Route::prefix('post')->name('post.')->group(function () {
            Route::get('/', 'Admin\PostController@index')->name('index');
            Route::get('/add', 'Admin\PostController@add')->name('add');
            Route::get('/edit/{id_post}', 'Admin\PostController@edit')->name('edit');

            Route::post('/create', 'Admin\PostController@create')->name('create');
            Route::post('/update/{id_post}', 'Admin\PostController@update')->name('update');
            Route::post('/delete/{id_post}', 'Admin\PostController@delete')->name('delete');
        });
    });
});

Route::prefix('/')->name('home.')->group(function () {
    Route::get('/', 'Home\HomeController@index')->name('index');
//    Route::get('/nguyen-tac-va-quy-dinh-chung', 'Main\HomeController@about')->name('about');
//    Route::get('/chinh-sach-bao-mat-thong-tin', 'Main\HomeController@policy')->name('policy');

    Route::get('/search', 'Home\HomeController@search')->name('search');
    Route::get('/{category_tag}', 'Home\HomeController@listPost')->name('listPost');
    Route::get('/{category_tag}/{post_tag}', 'Home\HomeController@detailPost')->name('detailPost');
});
