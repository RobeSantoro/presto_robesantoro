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

Route::get('/products', 'GuestController@products')->name('products');

Route::get('/categories', 'GuestController@categories')->name('categories');

Route::get('/contacts', 'GuestController@contacts')->name('contacts');
Route::post('/contacts/submit', 'GuestController@submit')->name('submit');
Route::get('/thankyou', 'GuestController@thankyou')->name('thankyou');



Route::get('/cards', 'GuestController@showCards')->name('cards_route'); //Questo è il "nome" della rotta
