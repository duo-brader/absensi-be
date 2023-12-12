<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index() {
        $user = User::all()->load("mapel", "absen");

        return $user;
    }
}
