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

    # 組織管理
    Route::group(['prefix'=>'company'], function()
    {
        # 組織基本資料
        Route::group(['prefix'=>'basic'], function()
        {
            Route::get('/', 'CompanyBasicController@index');
            Route::get('{id}', 'CompanyBasicController@getCompanyBasic');
            Route::post('/', 'CompanyBasicController@createCompanyBasic');
            Route::put('{id}', 'CompanyBasicController@updateCompanyBasic');
            Route::put('del/{id}', 'CompanyBasicController@deleteCompanyBasic');
        });
        # 單位管理
        Route::group(['prefix'=>'department'], function()
        {
            Route::get('/', 'CompanyDepartmentController@getCompanyDepartmentList');
            Route::post('/', 'CompanyDepartmentController@createCompanyDepartment');
            Route::put('{id}', 'CompanyDepartmentController@updateCompanyDepartment');
            Route::put('del/{id}', 'CompanyDepartmentController@deleteCompanyDepartment');
        });
        # 方案管理
        Route::group(['prefix'=>'plan'], function()
        {
            Route::get('/', 'CompanyPlanController@getCompanyPlanList');
            Route::post('/', 'CompanyPlanController@createCompanyPlan');
            Route::put('{id}', 'CompanyPlanController@updateCompanyPlan');
            Route::put('del/{id}', 'CompanyPlanController@deleteCompanyPlan');
        });
        # 人員管理
        Route::group(['prefix'=>'user'], function()
        {
            Route::get('/', 'UserController@getUserList');
            Route::post('/', 'UserController@createUser');
            Route::put('{id}', 'UserController@updateUser');
            Route::put('del/{id}', 'UserController@deleteUser');
        });
    });

    # 個人層級
    Route::group(['prefix'=>'person'], function()
    {
        # 服務人員管理
        Route::resource('serviceuser', 'PersonServiceUserController');
    });
});