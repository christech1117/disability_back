<?php

namespace App\Http\Controllers;

use App\CompanyPlan;
use Illuminate\Http\Request;
use App\Http\Resources\CompanyPlanResource;

class CompanyPlanController extends Controller
{
    public function getCompanyPlanList()
    {
        $plan = CompanyPlan::where('company_plans.company_id', 1)->get();

        return new CompanyPlanResource($plan);
    }

    public function createCompanyPlan(Request $request)
    {
        $companyBasic = CompanyBasic::create($request->all());

        return response()->json($companyBasic, 201);
    }

    public function updateCompanyPlan(Request $request, $id)
    {
        $companyBasic = CompanyBasic::findOrFail($id);
        $companyBasic->update($request->all());

        return new CompanyBasicResource($companyBasic);
    }

    public function deleteCompanyPlan(Request $request, $id)
    {
        $companyBasic = CompanyBasic::findOrFail($id);
        $companyBasic->update(['is_del' => 1]);

        return response()->json($companyBasic, 200);
    }
}
