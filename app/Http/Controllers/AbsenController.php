<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsenController extends Controller
{
    function index()
    {
        $user = Auth::user();
        $totalAbsenGuruUmum = Absen::where("user_id", $user->id)->where("roles_id", 2)->count();
        $totalAbsenGuruProduktif = Absen::where("user_id", $user->id)->where("roles_id", 3)->count();

        $totalAbsen = $totalAbsenGuruUmum + $totalAbsenGuruProduktif;
        $role = User::all("roles_id");

        $persentase = ($totalAbsen / 50) * 100;

        return response()->json([
            "message" => "Data berhasil didapatkan",
            "data" => [
                "totalAbsen" => $totalAbsen,
                "persentase" => $persentase,
                "role" => $role,
            ],
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
