<?php

namespace App\Http\Controllers;

use App\User;
use App\PersonServiceUser;
use App\CompanyBasic;
use Illuminate\Http\Request;
use App\Http\Resources\CompanyBasicResource;

class CompanyBasicController extends Controller
{
    public function index()
    {
        $companyBasic = CompanyBasic::all();

        return ['data' => $companyBasic, 'code' => 20000]; 
    }

    public function show($id)
    {
        $service_count = PersonServiceUser::count(); // 服務人數
        $user_count = User::count(); // 全職人員數量

        $companyBasic = CompanyBasic::select('company_basics.*', 'users.username', 'users.id as user_id')
        ->leftjoin('users', 'users.id', 'company_basics.user_id')
        ->where('company_basics.company_id', $id)
        ->firstOrFail();

        $companyBasic->setAttribute('service_count', $service_count);
        $companyBasic->setAttribute('user_count', $user_count);

        return new CompanyBasicResource($companyBasic);
    }

    public function create(Request $request)
    {
        $companyBasic = CompanyBasic::create($request->all());

        return ['data' => $companyBasic, 'code' => 20000];
    }

    public function update(Request $request, $id)
    {
        $companyBasic = CompanyBasic::findOrFail($id);
        $companyBasic->update($request->all());

        return ['data' => $companyBasic, 'code' => 20000];
    }

    public function destroy(Request $request, $id)
    {
        $companyBasic = CompanyBasic::findOrFail($id);
        $companyBasic->delete();

        return ['data' => $companyBasic, 'code' => 20000];
    }
}
