<?php

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

Route::group(['middleware' => 'cors'], function () {
    # 登入
    Route::group(['prefix' => 'user'], function () {
        Route::post('register', 'AuthController@register');
        Route::post('login', 'AuthController@login');

        Route::group(['middleware' => 'jwt.auth', 'jwt.refresh'], function () {
            Route::get('info', 'AuthController@getUserinfo');
            Route::post('logout', 'AuthController@logout');
        });
    });

    # 組織管理
    Route::group(['prefix' => 'company'], function () {
        Route::resource('basic', 'CompanyBasicController'); // 組織基本資料
        Route::resource('sub_company', 'CompanySubCompanyController'); // 子公司管理
        Route::resource('department', 'CompanyDepartmentController'); // 單位管理
        Route::resource('departday', 'CompanyDepartDayController'); // 單位管理[日間服務]
        Route::resource('departlive', 'CompanyDepartLiveController'); // 單位管理[居住服務]
        Route::resource('departjob', 'CompanyDepartJobController'); // 單位管理[就業服務]
        Route::resource('plan', 'CompanyPlanController'); // 方案管理
        Route::resource('user', 'UserController'); // 人員管理
    });

    # 個人層級
    Route::group(['prefix' => 'person'], function () {
        Route::resource('serviceuser', 'PersonServiceUserController'); // 服務人員管理
        # 個案基本資料
        Route::resource('basic', 'PersonBasicController'); // 個案基本資料
        // Route::resource('familystatus', 'PersonFamilyStatusController'); // 家庭狀況
        // 醫療史
        // 教育狀況
        // 安置/訓練服務經歷
        // 就業經歷
        // 福利補助狀況
        // 對服務需求與期待

        # 支持強度量表(SIS)訪談紀錄
        # 個別化支持服務計畫(ISP)
        # 個人成果量表(POS)訪談紀錄
    });
});
