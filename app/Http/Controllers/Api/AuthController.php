<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function init(Request $request)
    {/*
        $length = stripos($request->token, ';');
        $token = substr($request->token, 0, $length);
        if (!isset($token) && $token !== '') {
            return response()->json(User::where('remember_token', $token)->first());
            //if ((User::where('remember_token', $token)->first()) == $token) {
                //$user = Auth::user();
                //return response()->json(['user' => $user], 200);
            //}
        }*/

        $length = stripos($request->token, ';');
        $token = substr($request->token, 0, $length);
        //if (!isset($token) && $token !== '') {
            $user = User::where('remember_token', $token)->first();
            Auth::guard('api')->$user;

        //}
        return response()->json(Auth::user(), 200);
        //$user = Auth::user();
        //$user = $request;
        //return response()->json($token, 200);
        //return response()->json(User::where('remember_token', $request->token)->first() === $request->token, 200);
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['login' => $request->login, 'password' => $request->password], true)) {
            //return response()->json(Auth::user(), 200);
            return response()->json([Auth::user(), Auth::user()->getRememberToken()], 200);
        } else {
            return response()->json(['error' => 'Проверьте логин и пароль'], 401);
        }
    }

    public function register(Request $request)
    {
        $user = User::where('login', $request->login)->first();

        if(isset($user->id)) {
            return response()->json(['error' => 'Пользователь уже зарегистрирован'], 401);
        }

        $user = new User();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->patronymic = $request->patronymic;
        $user->login = $request->login;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->save();
        Auth::login($user);

        return response()->json($user,200);
    }

    public function logout()
    {
        Auth::logout();
    }
}
