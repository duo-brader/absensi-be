<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\LoginResource;
use App\Http\Resources\RegisterResource;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    function Register(RegisterRequest $request) : RegisterResource {
        $data = $request->validated();

        Hash::make($data["password"]);

        $user = User::create($data);

        return new RegisterResource($user);
    }

    function Login(LoginRequest $request)  {
        $data = $request->validated();

        $user = User::firstWhere("username", $data["username"]);

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken("auth_token")->plainTextToken;
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
        $request->user()->currentAccessToken()->delete();
        $request->user()->tokens()->delete();

        return response()->json([
            "message" => "Logout berhasil"
        ], 200);
    }

    function authUser() {
        $user = Auth::user();

        return response()->json($user, 200);
    }

    function indexRoles() {
        $roles = Roles::all();

        return $roles;
    }
}
