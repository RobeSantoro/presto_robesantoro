<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

//////////////////////////////////////////////////////////////////////////////
////////////////////////////////// HOME //////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
Route::get('/', 'GuestController@home_function')->name('home_route');
//SEARCH
Route::get('/search', 'GuestController@search_function' )->name('search');
//PRODUCT SHOW
Route::get('/product/details', 'GuestController@show_product_function')->name('product.details');


//////////////////////////////////////////////////////////////////////////////
/////////////////////////////// CATEGORIES ///////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
Route::get('/categories/{name}/{category_id}', 'GuestController@productByCategory_function')->name('productByCategory_route');


//////////////////////////////////////////////////////////////////////////////
/////////////////////////////// PRODUCT CRU //////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
// PRODUCTS INDEX
Route::get('/products', 'GuestController@index_products_function')->name('index_products_route');
// PRODUCT CREATE
Route::get('/product/create', 'UserController@create_product_function')->name('product.create');
// PRODUCT SHOW
Route::get('/product/{id}', 'UserController@show_product_function')->name('show_product_route');
// PRODUCT STORE
Route::post('/product/store', 'UserController@store_product_function')->name('store_product_route');
//THANKYOU
Route::get('/thankyou/publish', 'UserController@thankyou_publish_function')->name('thankyou_publish_route');


//////////////////////////////////////////////////////////////////////////////
////////////////////////////////// DROPZONE //////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
//      ADD IMAGES TO DROPZONE
Route::post('/product/images/upload', 'UserController@upload_product_images')->name('product.images.upload');
//      DELETE IMAGES IN DROPZONE
Route::delete('/product/images/remove', 'UserController@remove_product_images')->name('product.images.remove');
//      GET IMAGES AFTER VALIDATION ERRORS
Route::get('/product/images', 'UserController@get_product_images')->name('product.images');


//////////////////////////////////////////////////////////////////////////////
////////////////////////////////// REVISOR ///////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
// INDEX
Route::get('/revisor/home', 'RevisorController@index')->name('revisor.home');
// APPROVE
Route::post('/revisor/product/{id}/accept', 'RevisorController@accept')->name('revisor.accept');
// REJECT
Route::post('/revisor/product/{id}/reject', 'RevisorController@reject')->name('revisor.reject');


//////////////////////////////////////////////////////////////////////////////
///////////////////////////////// REVISOR MANAGEMENT /////////////////////////
//////////////////////////////////////////////////////////////////////////////
// REVISORS INDEX
Route::get('/revisors/index', 'UserController@index_revisors_function')->name('revisors_index_route');
// REVISOR CREATE
Route::get('/create/revisor', 'GuestController@create_revisor_function')->name('revisors_create_route');
// REVISOR STORE
Route::post('/store/revisor', 'GuestController@submit_function')->name('revisors_store_route');

// THANKYOU
Route::get('/thankyou', 'GuestController@thankyou_function')->name('thankyou_route');

// TEMP FEATURE TO BE REVISOR
Route::post('/become/revisor', 'UserController@makeMeRevisor');
