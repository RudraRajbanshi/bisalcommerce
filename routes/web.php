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

Route::get('/page', 'FrontController@page')->name('front'); 


Route::get('/category/create','CategoryController@create')->name('category.create');
Route::post('/category/create','CategoryController@store')->name('category.store');
Route::get('/category/read','CategoryController@view')->name('category.read');
Route::get('/category/edit/{id}','CategoryController@edit')->name('category.edit');
Route::put('/category/update','CategoryController@update')->name('category.update');
Route::delete('/category/delete','CategoryController@delete')->name('category.delete');

Route::get('/product/create','ProductController@create')->name('product.create');
Route::post('/product/create','ProductController@store')->name('product.store');
Route::get('/product/read','ProductController@view')->name('product.read');
Route::get('/product/edit/{id}','ProductController@edit')->name('product.edit');
Route::put('/product/edit','ProductController@update')->name('product.update');
Route::delete('/product/delete','ProductController@delete')->name('product.delete');

Route::get('/page/create','PageController@create')->name('page.create');
Route::post('/page/create','PageController@store')->name('product.store');
Route::get('/page/read','PageController@view')->name('page.read');

Route::get('/page/edit/{id}','PageController@edit')->name('page.edit');
Route::put('/page/edit/','PageController@update')->name('page.update');
Route::delete('/page/delete','PageController@delete')->name('page.delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('admin');
Route::get('/', 'FrontController@index')->name('front'); 
Route::get('/category/{id}', 'FrontController@category')->name('front.category'); 
Route::get('/product/{id}','FrontController@product')->name('front.product');
Route::get('/page/{id}','FrontController@page')->name('front.page');
Route::get('/contact','FrontController@contact')->name('front.contact');
Route::post('/contact','FrontController@contactPost')->name('front.contact.post');
Route::get('user/register','UserRegisterController@register')->name('user.register');
Route::post('user/register','UserRegisterController@registerPost')->name('registerPost');

Route::get('user/logout','UserRegisterController@logout')->name('user.logout')->middleware('auth');

Route::get('user/login','UserRegisterController@login')->name('user.login');
Route::post('user/login','UserRegisterController@loginProcess')->name('loginProcess');
Route::get('user/changepassword','UserRegisterController@changePassword')->name('changePassword')->middleware('auth');
Route::post('user/changepassword','UserRegisterController@changePasswordProcess')->name('changePasswordProcess')->middleware('auth');
Route::get('cart/add/{id}','CartController@addToCart')->name('addtocart');
Route::get('viewcart','CartController@cart')->name('cart');
Route::get('cart/delete/{id}','CartController@delete')->name('cart.delete');
Route::post('cart/edit','CartController@edit')->name('cart.edit');
Route::get('wishlist/add/{id}','WishController@add')->name('wish.add');
Route::get('wishlist/','WishController@wishlist')->name('wish');
Route::get('wishlist/delete/{id}','WishController@delete')->name('wish.delete');
Route::post('order/add','OrderController@addOrder')->name('order.add')->middleware('auth');
Route::get('order/view','OrderController@view')->name('order.view')->middleware('admin');
Route::get('order/viewdetail/{id}','OrderController@viewdetail')->name('viewdetail')->middleware('admin');
Route::post('order/changestatus','OrderController@changestatus')->name('order.changestatus')->middleware('admin');
Route::post('order/searchorder','OrderController@searchOrder')->name('order.searchOrder')->middleware('admin');

Route::get('searchproduct/', 'FrontController@search')->name('product.search');