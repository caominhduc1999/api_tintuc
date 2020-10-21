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

Route::get('categories', 'Admin\CategoryController@getAll');
Route::get('category/{id}', 'Admin\CategoryController@get');
Route::post('category/add', 'Admin\CategoryController@store');
Route::put('category/update/{id}', 'Admin\CategoryController@update');
Route::delete('category/delete/{id}', 'Admin\CategoryController@destroy');
