<?php

namespace Database\Seeders;

use App\Models\Mapel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mapel::create([
            "mapel" => "Bahasa Inggris"
        ]);

        Mapel::create([
            "mapel" => "Bahasa Indonesia"
        ]);

        Mapel::create([
            "mapel" => "Matematika"
        ]);

        Mapel::create([
            "mapel" => "PPKN"
        ]);

        Mapel::create([
            "mapel" => "Sejarah"
        ]);

        Mapel::create([
            "mapel" => "IPAS"
        ]);

        Mapel::create([
            "mapel" => "Kejuruan"
        ]);

        Mapel::create([
            "mapel" => "PJOK"
        ]);

        Mapel::create([
            "mapel" => "PAI"
        ]);

        Mapel::create([
            "mapel" => "Mulok"
        ]);

        Mapel::create([
            "mapel" => "Bk"
        ]);
        
        Mapel::create([
            "mapel" => "Bk"
        ]);
    }
}
