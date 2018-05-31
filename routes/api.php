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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



# 公司基本資料
Route::group(['middleware' => 'cors'], function()
{
    Route::get('user/login', 'getCompanyBasic@index');
    Route::get('company/basic', 'CompanyBasicController@index');
    Route::get('company/basic/{id}', 'CompanyBasicController@getCompanyBasic');
    Route::post('company/basic', 'CompanyBasicController@createCompanyBasic');
    Route::put('company/basic/{id}', 'CompanyBasicController@updateCompanyBasic');
    Route::put('company/basic/del/{id}', 'CompanyBasicController@deleteCompanyBasic');
});