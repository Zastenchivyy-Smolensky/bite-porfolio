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

Route::get("/products","App\Http\Controllers\ProductController@index")->name("product.index");
Route::get("/products/{id}", "App\Http\Controllers\ProductController@show")->name("product.show");
Route::get("/add","App\Http\Controllers\ProductController@add")->name("product.add");
Route::post("/create","App\Http\Controllers\ProductController@create")->name("product.create");
Route::delete("/products","App\Http\Controllers\ProductController@delete")->name("product.delete");