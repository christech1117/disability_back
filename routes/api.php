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



Route::group(['middleware' => 'cors'], function()
{
    # 登入
    Route::group(['prefix'=>'user'], function()
    {
        Route::post('register', 'AuthController@register');
        Route::post('login', 'AuthController@login');
        Route::get('info', 'AuthController@getUserinfo');
        Route::post('logout', 'AuthController@logout');
    });

    # 組織基本資料
    Route::group(['prefix'=>'company/basic'], function()
    {
        Route::get('/', 'CompanyBasicController@index');
        Route::get('{id}', 'CompanyBasicController@getCompanyBasic');
        Route::post('/', 'CompanyBasicController@createCompanyBasic');
        Route::put('{id}', 'CompanyBasicController@updateCompanyBasic');
        Route::put('del/{id}', 'CompanyBasicController@deleteCompanyBasic');
    });

    # 方案管理
    Route::group(['prefix'=>'company/plan'], function()
    {
        Route::get('/', 'CompanyPlanController@getCompanyPlanList');
        Route::post('/', 'CompanyPlanController@createCompanyPlan');
        Route::put('{id}', 'CompanyPlanController@updateCompanyPlan');
        Route::delete('{id}', 'CompanyPlanController@deleteCompanyPlan');
    });
});