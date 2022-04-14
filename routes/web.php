<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UsersController;
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
Route::group(['middleware' => 'auth'], function () {
    Route::get("/","App\Http\Controllers\ProductController@index")->name("product.index");
    Route::get("/products/{id}", "App\Http\Controllers\ProductController@show")->name("product.show");
    Route::get("/add","App\Http\Controllers\ProductController@add")->name("product.add");
    Route::get("/edit/{id}","App\Http\Controllers\ProductController@edit")->name("edit");
    Route::post('/update/{id}',"App\Http\Controllers\ProductController@update")->name('update');
    Route::post("/create","App\Http\Controllers\ProductController@create")->name("product.create");
    Route::post("/products/{id}","App\Http\Controllers\ProductController@delete")->name("product.delete");
    Route::post("/like","App\Http\Controllers\ProductController@like")->name("product.like");
    Route::get('/home', 'App\Http\Controllers\HomeController@index')->name("home");
    Route::post('/home', 'App\Http\Controllers\HomeController@my_page_update');
    Route::resource("/users", "App\Http\Controllers\UsersController",["only"=>["show"]]);
});
