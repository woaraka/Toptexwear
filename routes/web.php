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

/*Route::get('/clear-cache', function() {
    //$exitCode = Artisan::call('storage:link');
    $exitCode = Artisan::call('config:cache');
     return 1;
});*/

Route::get('/', 'indexController@index');
Route::get('/contact-us', 'indexController@contact');
Route::get('/about-us', 'indexController@about');
Route::get('/product/details/{id}', 'indexController@product_show')->name('product_show.details');
Route::get('/product/sub-category/{id}', 'indexController@product_sub_category')->name('product_show.sub_category');
Route::get('/product/category/{id}', 'indexController@product_category')->name('product_show.category');
Route::post('/product/contact/store', 'indexController@contact_store')->name('contact.store');

Auth::routes(['register' => false]);
//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Category start
Route::get('/admin/category', 'CategoryController@index')->name('category');
Route::post('/admin/category/store', 'CategoryController@store')->name('category.store');
Route::put('/admin/category/update/{id}', 'CategoryController@update')->name('category.update');
Route::get('/admin/category/delete/{id}', 'CategoryController@delete')->name('category.delete');

//Sub category start
Route::get('/admin/sub-category', 'SubCategoryController@index')->name('sub_category');
Route::post('/admin/sub-category/store', 'SubCategoryController@store')->name('sub_category.store');
Route::put('/admin/sub-category/update/{id}', 'SubCategoryController@update')->name('sub_category.update');
Route::get('/admin/sub-category/delete/{id}', 'SubCategoryController@delete')->name('sub_category.delete');

//product start
Route::get('/admin/product', 'ProductController@index')->name('product');
Route::post('/admin/product/store', 'ProductController@store')->name('product.store');
Route::put('/admin/product/update/{id}', 'ProductController@update')->name('product.update');
Route::get('/admin/product/delete/{id}', 'ProductController@delete')->name('product.delete');

//client start
Route::get('/admin/client', 'ClientController@index')->name('client');
Route::post('/admin/client/store', 'ClientController@store')->name('client.store');
Route::put('/admin/client/update/{id}', 'ClientController@update')->name('client.update');
Route::get('/admin/client/delete/{id}', 'ClientController@delete')->name('client.delete');

//slider start
Route::get('/admin/image-slider', 'MainSliderController@index')->name('slider');
Route::post('/admin/image-slider/store', 'MainSliderController@store')->name('slider.store');
Route::put('/admin/image-slider/update/{id}', 'MainSliderController@update')->name('slider.update');
Route::get('/admin/image-slider/delete/{id}', 'MainSliderController@delete')->name('slider.delete');
