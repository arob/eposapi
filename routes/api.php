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
    Route::apiResource('countries', 'API\CountryController');
    Route::apiResource('districts', 'API\DistrictController');
    Route::apiResource('thanas', 'API\ThanaController');
    Route::apiResource('tags', 'API\TagController');
    Route::apiResource('uoms', 'API\UomController');
    Route::apiResource('size-units', 'API\SizeUnitController');
    Route::apiResource('manufacturers', 'API\ManufacturerController');
    Route::apiResource('suppliers', 'API\SupplierController');
    Route::apiResource('customers', 'API\CustomerController');
    Route::apiResource('products', 'API\ProductController');
    Route::apiResource('purchase-invoices', 'API\PurchaseInvoiceController');
});