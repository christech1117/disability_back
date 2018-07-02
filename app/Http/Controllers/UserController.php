<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Input;

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
        ->get();

        return new UserResource($user);
    }

    public function show($id)
    {
        $user = User::where('users.company_id', $id)
        ->leftjoin('company_departments', 'company_departments.user_id', 'users.id')
        ->leftjoin('company_plans', 'company_plans.user_id', 'users.id')
        ->get();

        return new userResource($user);
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());

        return ['data' => $user, 'code' => 20000];
    }

    public function update(Request $request, $id)
    {
        $user = CompanyPlan::findOrFail($id);
        $user->update($request->all());

        return ['data' => $user, 'code' => 20000];
    }

    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return ['data' => $user, 'code' => 20000];
    }
}
