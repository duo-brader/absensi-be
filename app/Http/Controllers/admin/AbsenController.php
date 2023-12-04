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

        $persentaseTotal = ($totalAbsen / 50) * 100;
        $persentaseUmum = ($totalAbsenGuruUmum / 50) * 100;
        $persentaseProduktif = ($totalAbsenGuruProduktif / 50) * 100;

        return response()->json([
            "message" => "Data berhasil didapatkan",
            "data" => [
                // "totalAbsen" => $totalAbsen,
                // "persentaseTotal" => $persentaseTotal,
                "persentaseUmum" => $persentaseUmum,
                "persentaseProduktif" => $persent   aseProduktif,
            ],
        ], 200);
    }
    
    function indexAbsen() {
        $absen = Absen::all();

        return $absen;
    }
}
