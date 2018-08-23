<?php

namespace App\Http\Controllers;

use App\CompanyPlan;
use App\Http\Resources\CompanyPlanResource;
use App\User;
use Illuminate\Http\Request;

class CompanyPlanController extends Controller
{
    public function show($id)
    {
        $service_count = User::count(); // 服務人數

        $plan = CompanyPlan::select('company_plans.*', 'users.username', 'users.email', 'users.phone')
            ->leftjoin('users', 'users.id', 'company_plans.user_id')
            ->where('company_plans.company_id', $id)
            ->orderBy('company_plans.plan_id', 'desc')
            ->get();

        return new CompanyPlanResource($plan);
    }

    public function store(Request $request)
    {
        $plan = CompanyPlan::create($request->all());

        return ['data' => $plan, 'code' => 20000];
    }

    public function update(Request $request, $id)
    {
        $plan = CompanyPlan::findOrFail($id);
        $plan->update($request->all());

        return ['data' => $plan, 'code' => 20000];
    }

    public function destroy(Request $request, $id)
    {
        $plan = CompanyPlan::findOrFail($id);
        $plan->delete();

        return ['data' => $plan, 'code' => 20000];
    }
}
