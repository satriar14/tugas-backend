<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Auth extends Controller
{
    // Login API Token Sanctum
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = \App\Models\User::where('email', $request->email)->first();

        if($user){
            if(Hash::check($request->password, $user->password)){
                $token = $user->createToken('abogoboga')->plainTextToken;

                $data = [
                    "message" => "Login Success",
                    "data" => $user,
                    "token" => $token
                ];

                return response()->json($data, 200);
            }else{
                $data = [
                    "message" => "Login Failed"
                ];

                return response()->json($data, 401);
            }
        }else{
            $data = [
                "message" => "Login Failed"
            ];

            return response()->json($data, 401);
        }
    }
}
