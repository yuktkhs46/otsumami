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

Route::get('/', [App\Http\Controllers\RecipeController::class, 'index']);
//レシピ一覧画面を表示
Route::get('/', 'App\Http\Controllers\RecipeController@index');

route::resource('recipe', App\Http\Controllers\RecipeController::class);

//レシピ詳細画面を表示
// Route::get('recipe/{id}', 'App\Http\Controllers\RecipeController@showDetail');

// レシピ編集画面を表示
// Route::get('recipe/edit/{id}', 'App\Http\Controllers\RecipeController@edit');
// Route::post('recipe/edit/', 'App\Http\Controllers\RecipeController@update');

// レシピを削除
// Route::get('recipe/delete/{id}', 'App\Http\Controllers\RecipeController@delete');


// 管理者機能処理
Route::group(['prefix' => 'admin'], function() {
    Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');

    Route::get('recipe/index', 'App\Http\Controllers\Admin\RecipeController@index');
    Route::get('recipe/delete/{id}', 'App\Http\Controllers\Admin\RecipeController@delete');
    //
    Route::get('user/index', 'App\Http\Controllers\Admin\UserController@index');
    Route::get('user/delete', 'App\Http\Controllers\Admin\UserController@delete');
    //
    Route::get('tag/create', 'App\Http\Controllers\Admin\TagController@add');
    Route::post('tag/create', 'App\Http\Controllers\Admin\TagController@create');

    Route::get('tag/edit/{id}', 'App\Http\Controllers\Admin\TagController@edit');
    Route::post('tag/edit', 'App\Http\Controllers\Admin\TagController@update');

    Route::get('tag/delete/{id}', 'App\Http\Controllers\Admin\TagController@delete');
});





