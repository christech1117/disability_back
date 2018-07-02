<?php

namespace App\Http\Controllers;

use App\PersonFamilyStatus;
use Illuminate\Http\Request;

class PersonFamilyStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PersonFamilyStatus::all();

        return ['data' => $data, 'code' => 20000]; 
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
        $data = PersonFamilyStatus::create($request->all());

        return ['data' => $data, 'code' => 20000];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = PersonFamilyStatus::where('serviceuser_id', $id)->get();

        return new PersonFamilyStatusResource($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = PersonFamilyStatus::findOrFail($id);
        $data->update($request->all());

        return ['data' => $data, 'code' => 20000];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = PersonFamilyStatus::findOrFail($id);
        $data->delete();

        return ['data' => $data, 'code' => 20000];
    }
}
