<?php

namespace App\Http\Controllers;

use App\CompanyDepartment;
use App\Http\Resources\CompanyDepartmentResource;
use Illuminate\Http\Request;

class CompanyDepartmentController extends Controller
{
    public function show($id)
    {
        $department = CompanyDepartment::select('company_departments.*', 'users.id as user_id', 'users.username', 'company_plans.plan_name', 'company_sub_companies.sub_company_name')
            ->leftjoin('users', 'users.id', 'company_departments.user_id')
            ->leftjoin('company_plans', 'company_departments.plan_id', 'company_plans.plan_id')
            ->leftjoin('company_sub_companies', 'company_departments.sub_company_id', 'company_sub_companies.id')
            ->where('company_departments.company_id', $id)
            ->orderby('company_departments.depart_id', 'desc')
            ->get();

        // return ['data' => $department, 'code' => 20000];

        return new CompanyDepartmentResource($department);
    }

    public function store(Request $request)
    {
        $department = CompanyDepartment::create($request->all());

        return ['data' => $department, 'code' => 20000];
    }

    public function update(Request $request, $id)
    {
        $department = CompanyDepartment::findOrFail($id);
        $department->update($request->all());

        return ['data' => $department, 'code' => 20000];
    }

    public function destroy(Request $request, $id)
    {
        $department = CompanyDepartment::findOrFail($id);
        $department->delete();

        return ['data' => $department, 'code' => 20000];
    }
}
