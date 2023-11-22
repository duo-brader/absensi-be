<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsenController extends Controller
{
    function index() {
        $user = Auth::user();

        $absen = Absen::where("user_id", $user->id)->get()->count();

        return response()->json([
            "message" => "data berhasil didapatkan",
            "data" => $absen / 50 * 100 . "%"
        ], 200);
    }

    function store(Kelas $kelas) {
        $user = Auth::user();
        $data = [
            "user_id" => $user->id,
            "kelas_id" => $kelas->id
        ];

        $absen = Absen::create($data);

        if ($absen) {
            return response()->json([
                "message" => "absen berhasil",
            ], 201);
        } else {
            return response()->json([
                "message" => "absen gagal silahkan hubungi admin"
            ], 401);
        }
    }
}
