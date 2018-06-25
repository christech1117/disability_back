<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    public function getUserList()
    {
        $user = User::select('users.*', 'company_plans.plan_id', 'company_plans.plan_name', 'company_departments.depart_name', 'roles.id as role_id', 'roles.title')
        ->leftjoin('company_plans', 'company_plans.plan_id', 'users.plan_id')
        ->leftjoin('roles', 'roles.id', 'users.role_id')
        ->leftjoin('company_departments', 'company_departments.depart_id', 'users.depart_id')
        // ->leftjoin('teams_basics', 'teams_basics.team_id', 'users.team_id')
        ->where('users.is_del', '0')
        ->where('users.company_id', 1)
        ->get();

        return new UserResource($user);
    }

    public function getUser($id)
    {
        $service_count = User::count(); // 服務人數
        $user_count = User::count(); // 全職人員數量

        $user = User::select('company_basics.*', 'users.username')
        ->leftjoin('users', 'users.id', 'company_basics.user_id')
        ->where('company_basics.company_id', $id)
        ->firstOrFail();

        $user->setAttribute('service_count', $service_count);
        $user->setAttribute('user_count', $user_count);

        return new userResource($user);
    }

    public function createUser(Request $request)
    {
        $user = User::create($request->all());

        return ['data' => $user, 'code' => 20000];
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::select('users.*', 'company_plans.plan_id', 'company_plans.plan_name', 'roles.id as role_id', 'roles.title')
        ->leftjoin('company_plans', 'company_plans.plan_id', 'users.plan_id')
        ->leftjoin('roles', 'roles.id', 'users.role_id')
        // ->leftjoin('company_departs', 'company_departs.depart_id', 'users.depart_id')
        // ->leftjoin('teams_basics', 'teams_basics.team_id', 'users.team_id')
        ->where('users.is_del', '0')
        ->where('users.company_id', 1)
        ->where('users.id', $id)
        ->firstOrFail();
        $user->update($request->all());

        return ['data' => $user, 'code' => 20000];
    }

    public function deleteUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update(['is_del' => 1]);

        return ['data' => $user, 'code' => 20000];
    }
}
