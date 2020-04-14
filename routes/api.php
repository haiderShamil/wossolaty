<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::apiResource('/governorates','GovernorateController');
Route::apiResource('/account_roles','AccountRoleController');
Route::apiResource('/accounts','AccountController');
Route::apiResource('/invoice_types','InvoiceTypeController');
Route::apiResource('/payment_types','PaymentTypeController');
Route::apiResource('/invoices','InvoiceController');
Route::apiResource('/cash_types','CashTypeController');
Route::apiResource('/cash_details','CashDetailController');
Route::apiResource('/receipts','ReceiptController');
Route::apiResource('/stocks','StockController');
Route::apiResource('/products','ProductController');
Route::apiResource('/products_states','ProductStateController');
Route::get('indexStore/{id}','ProductController@indexStore');
Route::get('total/{id}','InvoiceController@total');
Route::post('someproducts','ProductController@someproducts');
Route::post('sumdepts','AccountController@sumdept');
Route::post('itemProfits','ProfitController@itemProfits');
Route::get('listProfits/{id}','ProfitController@listProfits');
Route::get('allProfits','ProfitController@allProfits');



