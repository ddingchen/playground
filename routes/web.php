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

// 多级城市选择控件
Route::get('multi-select', function () {
    return view('multi-select');
});
Route::get('nation', 'NationController@show');

// 冒泡排序
Route::get('sort/bubble', 'SortController@bubble');
