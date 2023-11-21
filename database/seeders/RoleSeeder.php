<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ["roles" => "admin"];

        Roles::create($data);
        Roles::create([
            "roles" => "guru umum"
        ]);
        Roles::create([
            "roles" => "kepala program"
        ]);
    }
}
