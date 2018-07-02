<?php

namespace App\Http\Controllers;

use App\User;
use App\CompanyDepartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Resources\CompanyDepartmentResource;

class CompanyDepartmentController extends Controller
{
    public function show($id)
    {
        $department = CompanyDepartment::select('company_departments.*', 'users.id as user_id', 'users.username', 'users.phone', 'company_plans.plan_name')
        ->leftjoin('users', 'users.id', 'company_departments.user_id')
        ->leftjoin('company_plans', 'company_departments.plan_id', 'company_plans.plan_id')
        ->where('company_departments.company_id', $id)
        ->get();

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
