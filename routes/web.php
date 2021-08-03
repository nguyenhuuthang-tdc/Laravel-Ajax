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

Route::get('/',[
    'as' => 'home',
    'uses' => 'PageController@getIndex'
]);
Route::get('cate-product',[
    'as' => 'cate_product',
    'uses' => 'PageController@getProductByAjax'
]);
Route::get('detail',[
    'as' => 'detail',
    'uses' => 'PageController@getDetailByAjax'
]);
