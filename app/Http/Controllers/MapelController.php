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
            "mapel" => "required",
            "tipe" => "required"
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors(), 401);
        }

        $data = [
            "mapel" => $request->mapel,
            "tipe" => $request->tipe
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

    function show($id) {
        $mapel = Mapel::firstWhere("id", $id);

        if ($mapel) {
            return response()->json([
                "message" => "data ditemukan",
                "mapel" => $mapel
            ], 200);
        } else {
            return response()->json([
                "message" => "data tidak ditemukan"
            ], 404);
        }
    }

    function edit(Request $request, $id) {
        $mapel = Mapel::firstWhere("id", $id);
        $mapel->update(["mapel" => $request->mapel, "tipe" => $request->tipe]);
        $mapel->save();

        return response()->json([
            "message" => "data berhasil diubah"
        ], 200);
    }

    function destroy($id) {
        $mapel = Mapel::firstWhere("id", $id);        
        $mapel->delete();

        return response()->json([
            "message" => "data berhasil dihapus"
        ], 200);
    }
}
