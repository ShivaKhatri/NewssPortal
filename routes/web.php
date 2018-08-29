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

Route::get('/', ['as' => 'home.index', 'uses' => 'HomeController@index']);

Route::get('/register', ['as' => 'register', 'uses' => 'Auth\RegisterController@register']);

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


    Route::get('literature/status', ['as' => 'testimonials.status', 'uses' => 'AdminController\TestomonialController@status']);

    Route::resource('literature','AdminController\TestomonialController');

    Route::get('videos/status', ['as' => 'videos.status', 'uses' => 'AdminController\VideoController@status']);

    Route::resource('videos','AdminController\VideoController');

    Route::get('headings/status', ['as' => 'headings.status', 'uses' => 'AdminController\SortHeadingController@status']);

    Route::resource('headings','AdminController\SortHeadingController');

    Route::get('ads/status', ['as' => 'ads.status', 'uses' => 'AdminController\AdsController@status']);

    Route::resource('ads','AdminController\AdsController');

    Route::resource('contacts','AdminController\ContactController');

    Route::resource('members','AdminController\FacultyMemberController');

    Route::get('/Password', ['as' => 'password', 'uses' => 'AdminController\ChangePasswordController@changePassword']);
    Route::post('/changePassword/{id}', ['as' => 'password.change', 'uses' => 'AdminController\ChangePasswordController@passwordUpdate']);

});

Auth::routes();

