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



//////////////////////////////////////////////////////////////////////////////
/////////////////////////////// CATEGORIES ///////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
Route::get('/categories/{name}/{category_id}', 'GuestController@productByCategory_function')->name('productByCategory_route');


//////////////////////////////////////////////////////////////////////////////
/////////////////////////////// PRODUCT CRU //////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
// PRODUCTS INDEX
Route::get('/products', 'GuestController@products_index_function')->name('products_index_route');
// PRODUCT CREATE
Route::get('/product/create', 'UserController@product_create_function')->name('product_create_route');
// PRODUCT STORE
Route::post('/product/store', 'UserController@store_product_function')->name('store_product_route');
/* //PRODUCT SHOW
Route::get('/product/{id}', 'GuestController@product_show_function')->name('product_show_route'); */

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
Route::get('/revisors/index', 'UserController@revisors_index_function')->name('revisors_index_route');
// REVISOR CREATE
Route::get('/create/revisor', 'GuestController@revisor_create_function')->name('revisors_create_route');
// REVISOR STORE
Route::post('/store/revisor', 'GuestController@submit_function')->name('revisors_store_route');

// THANKYOU
Route::get('/thankyou', 'GuestController@thankyou_function')->name('thankyou_route');

// TEMP FEATURE TO BE REVISOR
Route::post('/become/revisor', 'UserController@makeMeRevisor');
