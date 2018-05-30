<?php

use Illuminate\Http\Request;
use App\CompanyBasic;
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

Route::get('company_basics', 'CompanyBasicController@index');
Route::get('company_basics/{id}', 'CompanyBasicController@show');
Route::post('company_basics', 'CompanyBasicController@store');
Route::put('company_basics/{id}', 'CompanyBasicController@update');
Route::delete('company_basics/{id}', 'CompanyBasicController@delete');