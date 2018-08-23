<?php

namespace App\Http\Controllers;

use App\Http\Resources\PersonServiceUserResource;
use App\PersonServiceUser;
use Illuminate\Http\Request;

class PersonServiceUserController extends Controller
{
    public function index()
    {
        $service_user = PersonServiceUser::all();

        return new PersonServiceUserResource($service_user);
    }
    public function show($id)
    {
        $service_user = PersonServiceUser::where('company_id', $id)
            ->orderBy('person_service_users.id', 'desc')
            ->get();

        return new PersonServiceUserResource($service_user);
    }

    public function store(Request $request)
    {
        $service_user = PersonServiceUser::create($request->all());

        return ['data' => $service_user, 'code' => 20000];
    }

    public function update(Request $request, $id)
    {
        $service_user = PersonServiceUser::findOrFail($id);
        $service_user->update($request->all());

        return ['data' => $service_user, 'code' => 20000];
    }

    public function destroy(Request $request, $id)
    {
        $service_user = PersonServiceUser::findOrFail($id);
        $service_user->delete();

        return ['data' => $service_user, 'code' => 20000];
    }
}
