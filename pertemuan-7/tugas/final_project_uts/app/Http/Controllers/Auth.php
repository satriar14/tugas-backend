<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Auth extends Controller
{
    // Register API Token Sanctum
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('abogoboga')->plainTextToken;

        $data = [
            "message" => "Register Success",
            "data" => $user,
            "token" => $token
        ];

        return response()->json($data, 201);
    }

    // Login API Token Sanctum
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('abogoboga')->plainTextToken;

                $data = [
                    "message" => "Login Success",
                    "data" => $user,
                    "token" => $token
                ];

                return response()->json($data, 200);
            } else {
                $data = [
                    "message" => "Login Failed"
                ];

                return response()->json($data, 401);
            }
        } else {
            $data = [
                "message" => "Login Failed"
            ];

            return response()->json($data, 401);
        }
    }
}
