<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyBasic;
use App\Http\Resources\CompanyBasic as CompanyBasicResource;

class CompanyBasicController extends Controller
{
    public function index()
    {
        // return new CompanyBasicResource(CompanyBasic::all());
        return CompanyBasic::all();
    }

    public function getCompanyBasic($id)
    {
        $companyBasic = CompanyBasic::where('company_basics.company_id', $id)
        ->leftjoin('users', 'users.id', 'company_basics.member_id')
        ->first();

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

        return response()->json($companyBasic, 200);
    }

    public function deleteCompanyBasic(Request $request, $id)
    {
        $companyBasic = CompanyBasic::findOrFail($id);
        $companyBasic->update(['is_del' => 1]);

        return response()->json(null, 200);
    }
}
