<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    
    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');

        // Validate that the credentials are correct
        if (!Auth::attempt($credentials)){
            return response([
                "message" => "Usuario y/o contraseña es invalido."
            ],$status = 401);
        }

        /** @var \App\Models\User $user **/

        $user = Auth::user();
        $token = $user->createToken('authTestToken')->accessToken;


        return response([
            'user' => $user,
            'access_token' => $token            
        ]);

    }

}


