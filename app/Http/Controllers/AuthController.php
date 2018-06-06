<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\UserResource;

class AuthController extends Controller
{
    protected function register(Request $request)
    {
        return User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }

    protected function login(Request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password]))
        {
            $userInfo = Auth::user();

            return new UserResource($userInfo);
        } else {
            return 'false';
        }
    }

    protected function getUserinfo()
    {
        $userInfo = Auth::user();

        return new UserResource($userInfo);
    }

    protected function logout(Request $request)
    {
        return $user = array('data' => Auth::logout(), 'code' => 20000);
    }
}
