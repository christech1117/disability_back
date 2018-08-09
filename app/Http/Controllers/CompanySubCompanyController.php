<?php

namespace App\Http\Controllers;

use App\CompanySubCompany;
use Illuminate\Http\Request;

class CompanySubCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subCompany = CompanySubCompany::create($request->all());

        return ['data' => $subCompany, 'code' => 20000];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CompanySubCompany  $companySubCompany
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subCompany = CompanySubCompany::select('company_sub_companies.*')
        ->leftjoin('company_basics', 'company_basics.company_id', 'company_sub_companies.company_id')
        ->where('company_sub_companies.company_id', $id)
        ->get();

        return ['data' => $subCompany, 'code' => 20000];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CompanySubCompany  $companySubCompany
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CompanySubCompany  $companySubCompany
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $subCompany = CompanySubCompany::findOrFail($id);
        $subCompany->update($request->all());

        return ['data' => $subCompany, 'code' => 20000];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CompanySubCompany  $companySubCompany
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subCompany = CompanySubCompany::findOrFail($id);
        $subCompany->delete();

        return ['data' => $subCompany, 'code' => 20000];
    }
}
