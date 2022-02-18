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
// Data AJax routes
Route::get('/cariData', 'Admin\ProductController@dataAjax')->name('cariData');
Route::get('/cariDataProduct', 'Admin\ProductOrderController@dataAjaxProduct')->name('cariDataProduct');
Route::get('/cariDataProductPBF', 'Admin\WarehouseController@dataAjaxProduct')->name('cariDataProductPBF');
Route::get('/cariDataProductAja', 'Admin\ProductPriceController@dataAjaxProduct')->name('cariDataProductAja');
Route::get('/cariDataDistributor', 'Admin\ProductOrderController@dataAjaxDistributor')->name('cariDataDistributor');
Route::post('/AddMoreOrder', 'Admin\ProductOrderController@AddMoreOrder')->name('AddMoreOrder');
Route::get('6yt5fr5t6', 'ChartController@statusOrder')->name('grafik.transaksi.statusOrder');

Route::get('/detailDist/{id_distributor}','Admin\WarehouseController@detailDist');
Route::get('/detailOrder/{id_distributor}','Admin\WarehouseController@detailOrder');

Route::get('/autocomplete-search', [ProductController::class, 'autocompleteSearch']);

Route::prefix('admin')
->namespace('Admin')
->middleware('isActive')
->group(function() {
    Route::get('/','DashboardController@index')
    ->name('dashboard');

    Route::resource('user','UserController');
    Route::resource('warehouse','WarehouseController');
    Route::resource('distributor','DistributorController');
    Route::resource('product','ProductController');
    Route::resource('productPrice','ProductPriceController');
    Route::resource('productOrder','ProductOrderController');
    Route::resource('productStock','ProductStockController');

    

    
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
