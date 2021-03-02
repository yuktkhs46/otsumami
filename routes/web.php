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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\RecipeController::class, 'index'])->name('home');
//レシピ一覧画面を表示
Route::get('/home', 'App\Http\Controllers\RecipeController@index');


//レシピ投稿
Route::get('recipe/create', 'App\Http\Controllers\RecipeController@add');
Route::post('recipe/create', 'App\Http\Controllers\RecipeController@create');

//レシピ詳細画面を表示
Route::get('recipe/{id}', 'App\Http\Controllers\RecipeController@showDetail');

// レシピ編集画面を表示
Route::get('recipe/edit/{id}', 'App\Http\Controllers\RecipeController@edit');
Route::post('recipe/edit/', 'App\Http\Controllers\RecipeController@update');

// レシピを削除
Route::get('recipe/delete/{id}', 'App\Http\Controllers\RecipeController@delete');

// Route::get('news/create', 'App\Http\Controllers\Admin\NewsController@add')->middleware('auth');