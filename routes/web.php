<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'GuestController@home_function')->name('home_route'); //La stringa 'home_route' è il "nome" della rotta

Route::get('/categories/{name}/{category_id}', 'GuestController@categories_function')->name('categories_route');



Route::get('/contacts', 'GuestController@contacts_function')->name('contact_route');
Route::post('/contacts/submit', 'GuestController@submit_function')->name('submit_route');
Route::get('/thankyou', 'GuestController@thankyou_function')->name('thankyou_route');

Route::get('/showContacts', 'GuestController@showContacts_function')->name('showContacts_route');



// PRODUCT

//INDEX
Route::get('/products', 'GuestController@products_function')->name('products_route');
//CREATE
Route::get('/add_product', 'UserController@addProduct_function')->name('add_product_route');
//STORE
Route::post('/add_product/publish', 'UserController@publishProduct_function')->name('publish_product_route');
//THANKYOU
Route::get('/thankyou/publish', 'UserController@thankyou_publish_function')->name('thankyou_publish_route');
//SHOW
Route::get('/product/{id}', 'GuestController@product_details_function')->name('product_details');

