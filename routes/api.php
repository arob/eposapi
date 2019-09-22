<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function () {
    Route::apiResource('capacity-units', 'API\CapacityUnitController');
        
    Route::apiResource('countries', 'API\CountryController');
    Route::apiResource('districts', 'API\DistrictController');
    Route::apiResource('thanas', 'API\ThanaController');
    Route::apiResource('tags', 'API\TagController');
    Route::apiResource('uoms', 'API\UomController');

    Route::get('active-products', 'API\ProductController@activeProducts')
        ->name('active.products');
    Route::get('salable-products', 'API\ProductController@salableProducts')
        ->name('salable.products');

    Route::post('login', 'API\AuthController@login')->name('auth.login');
    
    Route::group(['middleware' => 'auth:api'], function () {        
        Route::apiResource('company', 'API\CompanyController');
        Route::apiResource('manufacturers', 'API\ManufacturerController');
        Route::apiResource('suppliers', 'API\SupplierController');
        Route::apiResource('customers', 'API\CustomerController');
        Route::apiResource('products', 'API\ProductController');
        Route::apiResource('purchase-invoices', 'API\PurchaseInvoiceController');
        Route::apiResource('sales-invoices', 'API\SalesInvoiceController');
        
        Route::apiResource('acc-categories', 'API\AccCategoryController');
        Route::apiResource('acc-heads', 'API\AccHeadController');


        Route::apiResource('purchase-orders', 'API\PurchaseOrderController');
        Route::apiResource('quotations', 'API\QuotationController');
        
        Route::post('register', 'API\AuthController@register')->name('auth.register');
        Route::get('users', 'API\AuthController@index')->name('auth.users');
        Route::post('users', 'API\AuthController@getUser')->name('auth.user');
        Route::get('users/{id}', 'API\AuthController@show')->name('auth.show');
        Route::put('users/{id}', 'API\AuthController@update')->name('auth.update');
    });
});