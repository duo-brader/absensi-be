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
        $totalAbsenGuruUmum = Absen::where("roles_id", 2)->count();
        $totalAbsenGuruProduktif = Absen::where("roles_id", 3)->count();

        $totalAbsen = $totalAbsenGuruUmum + $totalAbsenGuruProduktif;

        $persentase = ($totalAbsen / 50) * 100;

        return response()->json([
            "message" => "Data berhasil didapatkan",
            "data" => [
                "totalAbsen" => $totalAbsen,
                "persentase" => $persentase,
            ],
        ], 200);
    }




    function store(Kelas $kelas) {
        $user = Auth::user();
        $data = [
            "roles_id" => $user->roles_id,
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
