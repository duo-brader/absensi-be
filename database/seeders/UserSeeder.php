<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "roles_id" => 1,
            "nama" => "admin",
            "username" => "admin",
            "password" => Hash::make("admin")
        ]);
        User::create([
            "roles_id" => 2,
            "nama" => "farish",
            "username" => "farish",
            "password" => Hash::make("farish")
        ]);

        User::create([
            "roles_id" => 2,
            "nama" => "ibu guru",
            "username" => "guru",
            "password" => Hash::make("guru"),
        ]);
    }
}
