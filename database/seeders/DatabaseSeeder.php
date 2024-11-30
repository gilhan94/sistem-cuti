<?php

namespace Database\Seeders;

use App\Models\Divisi;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Divisi::create([
            "nama" => "IT Support"
        ]);

        User::factory()->create([
            'name' => 'admin',
            "password" => Hash::make("admin"),
            'role' => "admin"
        ]);

        User::factory()->create([
            'name' => 'supervisor',
            "password" => Hash::make("supervisor"),
            'role' => "supervisor"
        ]);

        User::factory()->create([
            'name' => 'karyawan',
            "password" => Hash::make("karyawan"),
            'role' => "karyawan",
            "divisi" => 1
        ]);
    }
}
