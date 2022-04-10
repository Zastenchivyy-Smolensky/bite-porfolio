<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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
Auth::routes();
Route::get("/","App\Http\Controllers\ProductController@index")->name("product.index")->middleware("auth");
Route::get("/products/{id}", "App\Http\Controllers\ProductController@show")->name("product.show")->middleware("auth");
Route::get("/add","App\Http\Controllers\ProductController@add")->name("product.add")->middleware("auth");
Route::get("/edit/{id}","App\Http\Controllers\ProductController@edit")->name("product.edit")->middleware("auth");
Route::post('/update/{id}',"App\Http\Controllers\ProductController@update")->name('update')->middleware("auth");
Route::post("/create","App\Http\Controllers\ProductController@create")->name("product.create")->middleware("auth");
Route::post("/products/{id}","App\Http\Controllers\ProductController@delete")->name("product.delete")->middleware("auth");
Route::post("/like","App\Http\Controllers\ProductController@like")->name("product.like");
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home_image', [App\Http\Controllers\HomeController::class, 'my_page_update'])->name('home');
