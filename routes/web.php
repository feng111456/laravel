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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/layouts', function () {
//     return view('layout');
// });

/**后台 */

Route::get('/','admin\HomePage@index');

/**管理员路由 */
Route::prefix('/admin')->group(function () {
    Route::get('index','Admin\Admin@index');
    Route::get('create','Admin\Admin@create');
    Route::post('store','Admin\Admin@store');
    Route::get('destroy/{id}','Admin\Admin@destroy');
    Route::get('edit/{id}','Admin\Admin@edit');
    Route::post('update/{id}','Admin\Admin@update');
    Route::post('checkAccount','Admin\Admin@checkAccount');
    Route::post('del','Admin\Admin@del');
});
/**新闻路由 */
Route::get('/news','admin\News@index');
Route::get('/particulars','admin\News@particulars');

//商品商品模板
Route::prefix('cart')->group(function () {
    Route::get('/','admin\Cart@index');//展示页面
    Route::get('create','admin\Cart@create');//添加视图
    Route::post('store','admin\Cart@store');//执行添加
    Route::get('destroy/{id}','admin\Cart@destroy');//执行删除
    Route::get('edit/{id}','admin\Cart@edit');//编辑视图
    Route::post('update/{id}','admin\Cart@update');//执行修改
    Route::post('checkonly','admin\Cart@checkonly');//ajax唯一
});

