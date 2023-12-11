<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function show($id) {
        $user = User::firstWhere("id", $id);

        return $user;
    }

    function update(UserRequest $request, $id) {
        $user = User::firstWhere("id", $id);

        $user->update($request->validated());
        $user->save();

        return "data berhasil diupdate";
    }

    function destory($id) {
        $user = User::firstWhere("id", $id);

        $user->delete();

        return response()->json([
            "message" => "data berhasil dihapus"
        ], 200);
    }
}
