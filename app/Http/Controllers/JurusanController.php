<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    function index() {
        $jurusan = Jurusan::all();

        return $jurusan;
    }
}
