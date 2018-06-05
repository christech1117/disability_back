<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
            // return $user = Auth::user();
            return $user = array('data' => Auth::user(), 'code' => 20000);
        } else {
            return 'false';
        }
    }

    protected function userinfo()
    {
        // if (Auth::check())
        // {
            return $user = array('data' => array('name' => 'admin', 'roles' => 'admin'), 'code' => 20000);
        // }
    }

    protected function logout(Request $request)
    {
        return $user = array('data' => Auth::logout(), 'code' => 20000);
    }
}
