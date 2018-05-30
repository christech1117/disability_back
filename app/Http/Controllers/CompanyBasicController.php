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

    public function show($id)
    {
        // return CompanyBasic::find($id);
        return new CompanyBasicResource(CompanyBasic::find($id));
    }

    public function store(Request $request)
    {
        $companyBasic = CompanyBasic::create($request->all());

        return response()->json($companyBasic, 201);
    }

    public function update(Request $request, $id)
    {
        $companyBasic = CompanyBasic::findOrFail($id);
        $companyBasic->update($request->all());

        return response()->json($companyBasic, 200);
    }

    public function delete(Request $request, $id)
    {
        $companyBasic = CompanyBasic::findOrFail($id);
        $companyBasic->delete();

        return response()->json(null, 204);
    }
}
