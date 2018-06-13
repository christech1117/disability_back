<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    public function getUserList()
    {
        $users = User::where('users.is_del', '0')
        ->where('company_id', 1)
        ->get();

        return new UserResource($users);
    }

    public function getCompanyBasic($id)
    {
        $service_count = User::count(); // 服務人數
        $user_count = User::count(); // 全職人員數量

        $companyBasic = CompanyBasic::select('company_basics.*', 'users.username')
        ->leftjoin('users', 'users.id', 'company_basics.user_id')
        ->where('company_basics.company_id', $id)
        ->firstOrFail();

        $companyBasic->setAttribute('service_count', $service_count);
        $companyBasic->setAttribute('user_count', $user_count);

        return new CompanyBasicResource($companyBasic);
    }

    public function createCompanyBasic(Request $request)
    {
        $companyBasic = CompanyBasic::create($request->all());

        return response()->json($companyBasic, 201);
    }

    public function updateCompanyBasic(Request $request, $id)
    {
        $companyBasic = CompanyBasic::findOrFail($id);
        $companyBasic->update($request->all());

        return new CompanyBasicResource($companyBasic);
    }

    public function deleteCompanyBasic(Request $request, $id)
    {
        $companyBasic = CompanyBasic::findOrFail($id);
        $companyBasic->update(['is_del' => 1]);

        return response()->json($companyBasic, 200);
    }
}
