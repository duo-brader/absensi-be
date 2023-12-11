<?php

namespace App\Http\Controllers;

use App\Models\Waktu;
use Illuminate\Http\Request;

class WaktuController extends Controller
{
    function index() {
        $waktu = Waktu::all();

        return $waktu;
    }
}
