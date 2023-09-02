<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function register(RegisterRequest $request)
    {
        $user = $request->registerUser();

        return response()->json([
            "success" => true,
            "user" => $user,
            "message" => "User created successfully",
        ], 201);
    }

    public function login(LoginRequest $request)
    {
        $user = $request->loginUser();

        if (!$user["success"]) {
            return response()->json([
                "success" => false,
                "message" => $user["message"],
            ], 401);
        }

        return response()->json([
            "success" => true,
            "token" => $user["token"],
            "message" => $user["message"],
        ], 200);
    }
}
