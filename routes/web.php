<?php

use Illuminate\Routing\RouteUri;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Route as RoutingRoute;

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

Route::get('/', 'GuestController@home_function')->name('home_route'); //Questo è il "nome" della rotta

Route::get('/products', 'GuestController@products_function')->name('products_route');

Route::get('/categories', 'GuestController@categories_function')->name('categories_route');

Route::get('/contacts', 'GuestController@contacts_function')->name('contact_route');

Route::post('/contacts/submit', 'GuestController@submit_function')->name('submit_route');
Route::get('/thankyou', 'GuestController@thankyou_function')->name('thankyou_route');

Route::get('/cards', 'GuestController@showCards_function')->name('cards_route'); //Questo è il "nome" della rotta
