<?php

namespace App\Http\Controllers;

use App\User;
use App\PersonServiceUser;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Input;

class PersonServiceUserController extends Controller
{
    public function getServiceUserList()
    {
        return $service_user = PersonServiceUser::select('person_service_users.*')
        ->where('person_service_users.is_del', '0')
        ->where('person_service_users.company_id', 1)
        ->get();

        return new UserResource($service_user);
    }

    public function getServiceUser($id)
    {
        $service_count = User::count(); // 服務人數
        $user_count = PersonServiceUser::count(); // 全職人員數量

        $service_user = PersonServiceUser::select('company_basics.*', 'users.username')
        ->leftjoin('users', 'users.id', 'company_basics.user_id')
        ->where('company_basics.company_id', $id)
        ->firstOrFail();

        $service_user->setAttribute('service_count', $service_count);
        $service_user->setAttribute('user_count', $user_count);

        return new userResource($service_user);
    }

    public function createServiceUser(Request $request)
    {
        $service_user = PersonServiceUser::create($request->all());

        return ['data' => $service_user, 'code' => 20000];
    }

    public function updateServiceUser(Request $request, $id)
    {
        $service_user = PersonServiceUser::select('users.*', 'company_plans.plan_id', 'company_plans.plan_name', 'roles.id as role_id', 'roles.title')
        ->leftjoin('company_plans', 'company_plans.plan_id', 'users.plan_id')
        ->leftjoin('roles', 'roles.id', 'users.role_id')
        // ->leftjoin('company_departs', 'company_departs.depart_id', 'users.depart_id')
        // ->leftjoin('teams_basics', 'teams_basics.team_id', 'users.team_id')
        ->where('users.is_del', '0')
        ->where('users.company_id', 1)
        ->where('users.id', $id)
        ->firstOrFail();
        $service_user->update($request->all());

        return ['data' => $service_user, 'code' => 20000];
    }

    public function deleteServiceUser(Request $request, $id)
    {
        $service_user = PersonServiceUser::findOrFail($id);
        $service_user->update(['is_del' => 1]);

        return ['data' => $service_user, 'code' => 20000];
    }
}
