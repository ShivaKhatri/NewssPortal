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

Route::get('/', function () {
    return view('welcome');
});
//Route::get('/login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
//Route::get('/register', ['as' => 'register', 'uses' => 'Auth\RegisterController@register']);

Route::group(['prefix' => '', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'AdminController\DashboardController@index']);

    Route::get('category/status', ['as' => 'categories.status', 'uses' => 'AdminController\CategoryController@status']);

    Route::resource('categories','AdminController\CategoryController');

    Route::get('article/status', ['as' => 'article.status', 'uses' => 'AdminController\ArticleController@status']);

    Route::resource('article','AdminController\ArticleController');

    Route::get('BreakingNews/status', ['as' => 'BreakingNews.status', 'uses' => 'AdminController\BreakingNewsController@status']);

    Route::resource('BreakingNews','AdminController\BreakingNewsController');

    Route::get('images/status', ['as' => 'images.status', 'uses' => 'AdminController\ImageController@status']);

    Route::resource('images','AdminController\ImageController');

    Route::get('testimonials/status', ['as' => 'testimonials.status', 'uses' => 'AdminController\TestomonialController@status']);

    Route::resource('testimonials','AdminController\TestomonialController');

    Route::get('videos/status', ['as' => 'videos.status', 'uses' => 'AdminController\VideoController@status']);

    Route::resource('videos','AdminController\VideoController');

    Route::get('headings/status', ['as' => 'headings.status', 'uses' => 'AdminController\SortHeadingController@status']);

    Route::resource('headings','AdminController\SortHeadingController');

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
