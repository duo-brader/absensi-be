<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    function Register(Request $request) {
        $validation = Validator::make($request->all(), [
            "name" => "required",
            "nip" => "required|unique:users,NIP",
            "password" => "required"
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors(), 401);
        }

        $data = [
            "name" => $request->name,
            "NIP" => $request->nip,
            "password" => $request->password
        ];

        Hash::make($data["password"]);

        $user = User::create($data);

        if ($user) {
            return response()->json([
                "message" => "Register sukses",
                "user" => $user
            ], 201);
        } else {
            return response()->json([
                "message" => "register failed"
            ], 401);
        }
    }

    function Login(Request $request) {
        $validation = Validator::make($request->all(), [
            "nip" => "required",
            "password" => "required"
        ]);
        
        if ($validation->fails()) {
            return response()->json($validation->errors(), 401);
        }

        $user = User::firstWhere("NIP", $request->nip);

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken()->plainTextToken;

                return response()->json([
                    "message" => "login berhasil",
                    "data" => [
                        "user" => $user,
                        "token" => $token
                    ]
                ], 200);
            } else {
                return response()->json([
                    "message" => "Username atau password salah"
                ], 400);
            }
        } else {
            return response()->json([
                "message" => "Akun tidak terdaftar! Silahkan hubungi admin"
            ], 404);
        }
    }

    function Logout(Request $request) {
        $request->user()->currentAccessTokens()->delete();
        $request->user()->token()->delete();

        return response()->json([
            "message" => "Logout berhasil"
        ], 200);
    }
}
