<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\Input;

use App\Http\Resources\AuthResource;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    protected function register(Request $request)
    {
        // 驗證規則：由于业务需求，这里我更改了一下登录的用户名，使用手机号码登录
        $this->validate($request, [
            'username' => 'required|string|max:20',
            'password' => 'required|string|max:20',
        ]);

        $credentials = [
            'company_id' => $request->company_id,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id,
        ];
        $user = User::create($credentials);
        if ($user) {
            $token = JWTAuth::fromUser($user);
            return response()->json(['result' => $token]);
        }
        return response(['message' => '帳號或信箱已被註冊']);
    }

    protected function login(Request $request)
    {
        // 驗證規則：由于业务需求，这里我更改了一下登录的用户名，使用手机号码登录
        $this->validate($request, [
            'username' => 'required|string|min:3|max:20',
            'password' => 'required|string|min:3|max:20',
        ]);

        $credentials = $request->only('username', 'password');

        if ($token = JWTAuth::attempt($credentials)) {
            return response(['data' => ['token' => $token], 'code' => 20000]);
        } else {
            return response(['message' => '帳號或密碼錯誤']);
        }

        // // 驗證參數，如果驗證失敗，則會拋出 ValidationException 的錯誤
        // $params = $this->validate($request, $rules);

        // // 使用 Auth 登入用户，如果登入失敗return，若成功則return 20000 的 code 和 token
        // if (!$token = Auth::guard('api')->attempt($params)) {
        //     return response(['message' => '帳號或密碼錯誤']);
        // }
        // $userInfo = Auth::user();

        // // $user = User::find($userInfo->id);
        // // $user->token = $token;
        // // $user->save();

        // return response(['data' => ['token'=>$token], 'code' => 20000]);
    }

    protected function getUserinfo()
    {
        $token = JWTAuth::getToken();
        $user = JWTAuth::parseToken()->authenticate();

        $role = Role::find($user->role_id);

        $user->setAttribute('roles', $role->title);

        return new AuthResource($user);
    }

    protected function logout(Request $request)
    {
        Auth::guard('api')->logout();

        return response(['message' => '登出成功', 'code' => 20000]);
    }
}
