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

Route::group(['namespace' => 'Comment', 'prefix' => 'comments'], function () {
    Route::get('/', 'IndexController');
    Route::post('/show', 'ShowController');
    Route::post('/create', 'StoreController');
    Route::patch('/{comment}', 'UpdateController');
    Route::delete('/{comment}', 'DeleteController');
});
