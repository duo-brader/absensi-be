<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index() {
        $user = User::all()->load("mapel");

        return $user;
    }

    function totalUser() {
        $user = User::all()->count();

        return $user;
    }
}
