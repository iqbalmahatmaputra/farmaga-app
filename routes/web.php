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
    return view('auth.login');
});
Route::get('/cariData', 'Admin\ProductController@dataAjax')->name('cariData');

Route::get('/autocomplete-search', [ProductController::class, 'autocompleteSearch']);

Route::prefix('admin')
->namespace('Admin')
->middleware('isActive')
->group(function() {
    Route::get('/','DashboardController@index')
    ->name('dashboard');

    Route::resource('user','UserController');
    Route::resource('distributor','DistributorController');
    Route::resource('product','ProductController');
    Route::resource('productPrice','ProductPriceController');

    

    
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
