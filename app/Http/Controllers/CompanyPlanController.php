<?php

namespace App\Http\Controllers;

use App\User;
use App\CompanyPlan;
use Illuminate\Http\Request;
use App\Http\Resources\CompanyPlanResource;

class CompanyPlanController extends Controller
{
    public function getCompanyPlanList($id)
    {
        $service_count = User::count(); // 服務人數

        $plan = CompanyPlan::select('company_plans.*', 'users.username', 'users.email', 'users.phone')
        ->leftjoin('users', 'users.id', 'company_plans.user_id')
        ->where('company_plans.company_id', $id)
        ->get();

        return new CompanyPlanResource($plan);
    }

    public function createCompanyPlan(Request $request)
    {
        $plan = CompanyPlan::create($request->all());

        return response()->json($plan, 201);
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
