<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MapelController extends Controller
{
    function index() {
        $mapel = Mapel::all();
        
        if ($mapel) {
            return response()->json([
                "message" => "data mapel found",
                "mapel" => $mapel
            ], 200);
        } else {
            return response()->json([
                "message" => "data not found",
            ], 404);
        }
    }

    function store(Request $request) {
        $validation = Validator::make($request->all(), [
            "mapel" => "required|min:8"
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors(), 401);
        }

        $data = [
            "mapel" => $request->mapel
        ];

        $mapel = Mapel::create($data);

        if ($mapel) {
            return response()->json([
                "message" => "data berhasil ditambahkan",
                "mapel" => $mapel
            ], 201);
        } else {
            return response()->json([
                "message" => "data not found",
            ], 404);
        }
    }
}
