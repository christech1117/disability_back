<?php

namespace App\Http\Controllers;

use App\User;
use App\CompanyDepartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Resources\CompanyDepartmentResource;

class CompanyDepartmentController extends Controller
{
    public function getCompanyDepartmentList()
    {
        $service_count = User::count(); // 服務人數

        $department = CompanyDepartment::select('company_departments.*', 'users.id as user_id', 'users.username', 'users.phone', 'company_plans.plan_name')
        ->leftjoin('users', 'users.id', 'company_departments.user_id')
        ->leftjoin('company_plans', 'company_departments.plan_id', 'company_plans.plan_id')
        ->where('company_departments.is_del', '0')
        // ->where('company_departments.company_id', Input::get('company_id'))
        ->get();

        return new CompanyDepartmentResource($department);
    }

    public function createCompanyDepartment(Request $request)
    {
        $department = CompanyDepartment::create($request->all());

        return ['data' => $department, 'code' => 20000];
    }

    public function updateCompanyDepartment(Request $request, $id)
    {
        $department = CompanyDepartment::findOrFail($id);
        $department->update($request->all());

        return ['data' => $department, 'code' => 20000];
    }

    public function deleteCompanyDepartment(Request $request, $id)
    {
        $department = CompanyDepartment::findOrFail($id);
        $department->update(['is_del' => 1]);

        return ['data' => $department, 'code' => 20000];
    }
}
