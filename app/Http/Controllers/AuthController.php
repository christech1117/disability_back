<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Transformers\UserTransformer;

use Illuminate\Support\Facades\Hash;
use App\Http\Resources\AuthResource;
use Illuminate\Support\Facades\Input;


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
        // 驗證規則：由于业务需求，这里我更改了一下登录的用户名，使用手机号码登录
        $rules = [
            'username' => 'required|string|max:20',
            'password' => 'required|string|max:20',
        ];

        // 驗證參數，如果驗證失敗，則會拋出 ValidationException 的錯誤
        $params = $this->validate($request, $rules);

        // 使用 Auth 登入用户，如果登入失敗return，若成功則return 20000 的 code 和 token
        if (!$token = Auth::guard('api')->attempt($params)) {
            return response(['message' => '帳號或密碼錯誤']);
        }
        $userInfo = Auth::user();

        // $user = User::find($userInfo->id);
        // $user->token = $token;
        // $user->save();

        return response(['data' => ['token'=>$token], 'code' => 20000]);
    }

    protected function getUserinfo()
    {
        $userInfo = User::select('users.*', 'roles.*')
        ->leftjoin('roles', 'users.role_id', 'roles.id')
        ->where('token', Input::get('token'))
        ->first();

        if (!$userInfo) {
            return response(['code' => 50014]);
        }
        return new AuthResource($userInfo);
    }

    protected function logout(Request $request)
    {
        Auth::guard('api')->logout();

        return response(['message' => '登出成功', 'code' => 20000]);
    }
}
