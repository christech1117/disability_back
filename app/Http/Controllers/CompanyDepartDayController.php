<?php

namespace App\Http\Controllers;

use App\CompanyDepartDay;
use Illuminate\Http\Request;

class CompanyDepartDayController extends Controller
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
        $companyDepartDay = CompanyDepartDay::create($request->all());

        return ['data' => $companyDepartDay, 'code' => 20000];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CompanyDepartDay  $companyDepartDay
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyDepartDay $companyDepartDay)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CompanyDepartDay  $companyDepartDay
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyDepartDay $companyDepartDay)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CompanyDepartDay  $companyDepartDay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $companyDepartDay = CompanyDepartDay::findOrFail($id);
        $companyDepartDay->update($request->all());

        return ['data' => $companyDepartDay, 'code' => 20000];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CompanyDepartDay  $companyDepartDay
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyDepartDay $companyDepartDay)
    {
        //
    }
}
