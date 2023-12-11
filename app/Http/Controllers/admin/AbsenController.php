<?php

namespace App\Http\Controllers\admin;

use App\Models\Absen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class AbsenController extends Controller
{
    function index()
    {

        return User::withCount([
            'absen as metode_pjj' => function ($query) {
                $query->where('metode_pembelajaran', 'pjj');
            },
            'absen as metode_pkk' => function ($query) {
                $query->where('metode_pembelajaran', 'pkk');
            },
        ])->get();
        // $totalAbsenGuruUmum = Absen::whereRelation("user", "roles_id", "=", 2)->count();
        // $totalAbsenGuruProduktif = Absen::whereRelation("user", "roles_id", "=", 3)->count();

        // $pjj = User::whereRelation("absen", "metode_pembelajaran", "pjj")->count();
        // $pkk = User::whereRelation("absen", "metode_pembelajaran", "pkk")->count();

        // $totalAbsen = $pjj + $pkk;

        // $persentaseTotal = ($totalAbsen / 50) * 100;
        // $persentaseUmum = ($pjj / 50) * 100;
        // $persentaseProduktif = ($pkk / 50) * 100;

        // return response()->json([
        //     "message" => "Data berhasil didapatkan",
        //     "data" => [
        //         "persentaseUmum" => $persentaseUmum,
        //         "persentaseProduktif" => $persentaseProduktif,
        //     ],
        // ], 200);
    }
    
    function indexAbsen() {
        $absen = Absen::all();

        return $absen;
    }
}
