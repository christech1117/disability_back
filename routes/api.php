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

Route::get('test', function(){
    return response([1,2,3,4], 200);
});

Route::get('company/basic', 'CompanyBasicController@index');
Route::get('company/basic/{id}', 'CompanyBasicController@show');
Route::post('company/basic', 'CompanyBasicController@store');
Route::put('company/basic/{id}', 'CompanyBasicController@update');
Route::delete('company/basic/{id}', 'CompanyBasicController@delete');