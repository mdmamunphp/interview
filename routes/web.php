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
    return view('master');
});



Route::resource("customer", "CustomerController");

Route::resource("category", "CategoryController");
Route::post("category/get_details", "CategoryController@get_details");
Route::post("category/category_detelete", "CategoryController@category_detelete");

Route::resource("product", "ProductController");
Route::resource("order", "OrderController");

Route::post("order/orderadd", "OrderController@orderadd");
Route::post("order/store", "OrderController@store");

Route::post("order/customer", "OrderController@customer");
