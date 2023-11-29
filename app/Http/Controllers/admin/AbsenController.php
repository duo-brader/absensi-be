<?php

namespace App\Http\Controllers\admin;

use App\Models\Absen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AbsenController extends Controller
{
    function index()
    {
        $totalAbsenGuruUmum = Absen::whereRelation("user", "roles_id", "=", 2)->count();
        $totalAbsenGuruProduktif = Absen::whereRelation("user", "roles_id", "=", 3)->count();

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
}
