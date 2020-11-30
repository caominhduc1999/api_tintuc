<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'jwt.verify'], function ($router) {
    Route::resource('categories', 'Admin\CategoryController');
    Route::post('search-categories', 'Admin\CategoryController@search');

    Route::resource('articles', 'Admin\ArticleController');
    Route::post('search-articles', 'Admin\ArticleController@search');

    Route::resource('tags', 'Admin\TagController');
    Route::post('search-tags', 'Admin\TagController@search');

    Route::resource('users', 'Admin\UserController');
    Route::post('search-users', 'Admin\UserController@search');

    Route::resource('comments', 'Admin\CommentController')->only(['store']);
});

Route::get('get-categories', 'Admin\ArticleController@categories');
Route::get('get-tags', 'Admin\ArticleController@tags');
Route::get('get-article-by-category/{id}', 'Admin\ArticleController@getArticleByCategory');
Route::get('get-article-by-user/{id}', 'Admin\ArticleController@getArticleByUser');
Route::get('get-article-by-tag/{id}', 'Admin\ArticleController@getArticleByTag');
Route::get('get-latest-articles', 'Admin\ArticleController@getLatestArticle');
Route::get('get-most-view-articles', 'Admin\ArticleController@getMostViewArticle');
Route::get('get-hottest-articles', 'Admin\ArticleController@getHottestArticle');

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});
