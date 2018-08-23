<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Input;
use Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::select('users.*', 'company_plans.plan_id', 'company_plans.plan_name', 'company_departments.depart_name', 'roles.id as role_id', 'roles.title')
        ->leftjoin('company_plans', 'company_plans.plan_id', 'users.plan_id')
        ->leftjoin('roles', 'roles.id', 'users.role_id')
        ->leftjoin('company_departments', 'company_departments.depart_id', 'users.depart_id')
        // ->leftjoin('teams_basics', 'teams_basics.team_id', 'users.team_id')
        ->where('users.company_id', 1)
        ->orderBy('users.user_id', 'desc')
        ->get();

        return new UserResource($user);
    }

    public function show($id)
    {
        $user = User::select('users.*', 'company_plans.plan_id', 'company_plans.plan_name', 'company_departments.depart_name')
        ->leftjoin('company_departments', 'company_departments.depart_id', 'users.depart_id')
        ->leftjoin('company_plans', 'company_plans.plan_id', 'users.plan_id')
        ->where('users.company_id', $id)
        ->orderBy('users.id', 'desc')
        ->get();

        // return ['data' => $user, 'code' => 20000];

        return new userResource($user);
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->company_id = $request->company_id;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->avatar = $request->avatar;
        $user->work_start_date = $request->work_start_date;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->depart_id = $request->depart_id;
        $user->work_title = $request->work_title;
        $user->plan_id = $request->plan_id;
        $user->team_id = $request->team_id;
        $user->role_name = $request->role_name;
        $user->role_id = $request->role_id;
        $user->approve_status = $request->approve_status;
        $user->income = $request->income;
        $user->active = $request->active;
        $user->token = $request->token;
        $user->save();

        return ['data' => $user, 'code' => 20000];
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->avatar = $request->avatar;
        $user->work_start_date = $request->work_start_date;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->depart_id = $request->depart_id;
        $user->work_title = $request->work_title;
        $user->plan_id = $request->plan_id;
        $user->team_id = $request->team_id;
        $user->role_name = $request->role_name;
        $user->role_id = $request->role_id;
        $user->approve_status = $request->approve_status;
        $user->income = $request->income;
        $user->active = $request->active;
        $user->token = $request->token;
        $user->save();

        return ['data' => $user, 'code' => 20000];
    }

    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return ['data' => $user, 'code' => 20000];
    }
}
