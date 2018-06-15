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

        $plan = CompanyDepartment::select('company_departments.*', 'users.*')
        ->leftjoin('users', 'users.id', 'company_departments.user_id')
        // ->where('company_departments.company_id', Input::get('company_id'))
        ->get();
        return ['data'=>$plan, 'code'=>20000];
        return new CompanyPlanResource($plan);
    }

    public function createCompanyPlan(Request $request)
    {
        $plan = CompanyPlan::create($request->all());

        return ['data' => $plan, 'code' => 20000];
    }

    public function updateCompanyPlan(Request $request, $id)
    {
        $plan = CompanyPlan::findOrFail($id);
        $plan->update($request->all());

    return new CompanyPlanResource($plan);
    }

    public function deleteCompanyPlan(Request $request, $id)
    {
        $plan = CompanyPlan::findOrFail($id);
        $plan->update(['is_del' => 1]);

        return response()->json($plan, 200);
    }
}
