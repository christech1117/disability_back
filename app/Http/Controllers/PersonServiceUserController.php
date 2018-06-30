<?php

namespace App\Http\Controllers;

use App\User;
use App\PersonServiceUser;
use Illuminate\Http\Request;
use App\Http\Resources\PersonServiceUserResource;
use Illuminate\Support\Facades\Input;

class PersonServiceUserController extends Controller
{
    public function show($id)
    {
        $service_user = PersonServiceUser::where('company_id', $id)->get();

        return new PersonServiceUserResource($service_user);
    }

    public function store(Request $request)
    {
        $service_user = new PersonServiceUser;

        $service_user->name = $request->name;
        $service_user->company_id = $request->company_id;
        $service_user->birthday = $request->birthday;
        $service_user->identity = $request->identity;
        $service_user->house_address = $request->house_address;
        $service_user->contact_address = $request->contact_address;

        $service_user->save();

        return ['data' => $service_user, 'code' => 20000];
    }

    public function update(Request $request)
    {
        $service_user = PersonServiceUser::find(1);

        $service_user->name = $request->name;

        $service_user->save();

        return ['data' => $service_user, 'code' => 20000];
    }

    public function destroy(Request $request, $id)
    {
        $service_user = PersonServiceUser::findOrFail($id);
        $service_user->delete();

        return ['data' => $service_user, 'code' => 20000];
    }
}
