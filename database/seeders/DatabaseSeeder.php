<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // $this->call(UserSeeder::class);
        $this->call(ServiceSeeder::class);
        // $this->call(PatientSeeder::class);

        DB::table('users')->insert([
            [
                "name" => "Admin",
                "email" => "admin@mail.com",
                "role" => "admin",
                "password" => bcrypt('password'),
            ],
            [
                "name" => "Dr. Lestari",
                "email" => "dokter@mail.com",
                "role" => "dokter",
                "password" => bcrypt('password'),
            ],
            [
                "name" => "Bidan. Duriah",
                "email" => "bidan@mail.com",
                "role" => "bidan",
                "password" => bcrypt('password'),
            ],
            [
                "name" => "Apoteker",
                "email" => "apoteker@mail.com",
                "role" => "apoteker",
                "password" => bcrypt('password'),
            ]
        ]);
    }
}
