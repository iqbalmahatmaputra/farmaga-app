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
Route::middleware('isActive')->group(function(){
// Data AJax routes
Route::get('/cariData', 'Admin\ProductController@dataAjax')->name('cariData');
Route::get('/cariDataProductAja', 'Admin\ProductPriceController@dataAjaxProduct')->name('cariDataProductAja');
Route::get('/autocomplete-search', [ProductController::class, 'autocompleteSearch']);

Route::get('6yt5fr5t6', 'ChartController@statusOrder')->name('grafik.transaksi.statusOrder');
// Warehouse
Route::get('/cariDataProductPBF', 'Admin\WarehouseController@dataAjaxProduct')->name('cariDataProductPBF');
Route::get('/detailDist/{id_distributor}','Admin\WarehouseController@detailDist');
Route::get('/detailOrder/{id_distributor}','Admin\ProductStockController@detailOrder');
Route::get('/detailOrder2/{id_distributor}','Admin\ProductStockController@detailOrder2');

// ProductOrder
Route::get('/cariDataProduct', 'Admin\ProductOrderController@dataAjaxProduct')->name('cariDataProduct');
Route::get('/cariDataDistributor', 'Admin\ProductOrderController@dataAjaxDistributor')->name('cariDataDistributor');
Route::post('/AddMoreOrder', 'Admin\ProductOrderController@AddMoreOrder')->name('AddMoreOrder');
Route::post('/CheckOutAll', 'Admin\ProductOrderController@CheckOutAll')->name('CheckOutAll');
Route::get('/getOrderData/{id}','Admin\ProductOrderController@getOrderData');
Route::get('/getOrderDataProses/{id}','Admin\ProductOrderController@getOrderDataProses');
Route::get('/updateToProses/{id}','Admin\ProductOrderController@updateToProses');
Route::get('/updateToProsesBatal/{id}','Admin\ProductOrderController@updateToProsesBatal');
// Confirmation Arrive
Route::get('/showArriveList/{id}', 'Admin\ProductOrderController@showArriveList');
Route::get('/getOrderDataArrive/{id}','Admin\ProductOrderController@getOrderDataArrive');
Route::get('/getOrderDataAccept/{id}','Admin\ProductOrderController@getOrderDataAccept');
Route::get('/updateToAccept/{id}','Admin\ProductOrderController@updateToAccept');
Route::get('/updateToAcceptCancel/{id}','Admin\ProductOrderController@updateToAcceptCancel');
Route::put('/updateOrder/{id}','Admin\ProductOrderController@updateOrder')->name('updateOrder');


// ProductStock
Route::post('/AddMoreStock', 'Admin\ProductStockController@AddMoreStock')->name('AddMoreStock');
Route::get('/cariDataStock/{id}', 'Admin\ProductStockController@dataAjaxStock');
Route::get('/showDetail/{id}', 'Admin\ProductStockController@showDetail');
Route::get('/showDetailTransactional/{id}', 'Admin\ProductStockController@showDetailTransactional');
Route::get('/getTransRequest/{id}','Admin\ProductStockController@getTransRequest');
Route::get('/getTransArrive/{id}','Admin\ProductStockController@getTransArrive');
Route::get('/updateToTransArrive/{id}','Admin\ProductStockController@updateToTransArrive');
Route::get('/updateToTransRequest/{id}','Admin\ProductStockController@updateToTransRequest');
Route::get('/batalOrderStock/{id}','Admin\ProductStockController@batalOrderStock');
Route::get('/getProductList/{id}','Admin\ProductStockController@getProductList');

});

Route::prefix('admin')
->namespace('Admin')
->middleware('isActive')
->group(function() {
    Route::get('/','DashboardController@index')
    ->name('dashboard');

    Route::resource('cabang','CabangController');
    Route::resource('distributor','DistributorController');
    Route::resource('product','ProductController');
    Route::resource('productPrice','ProductPriceController');
    Route::resource('productOrder','ProductOrderController');
    Route::resource('productStock','ProductStockController');
    Route::resource('user','UserController');
    Route::resource('warehouse','WarehouseController');
    Route::resource('payment','PaymentController');
    Route::resource('bantuan','BantuanController');

    

    
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
