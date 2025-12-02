<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Emiliano',
                "lastname" => 'Pacheco',
                'email' => "admin@insano.com",
                'password' => Hash::make("admin1"),
                "cellphone" => "1111111111",
                "active" => true,
                "role_id" => 1,
            ],
            [
                'name' => 'Jimena',
                "lastname" => 'Flores',
                'email' => "teacher@gmail.com",
                'password' => Hash::make("teacher1"),
                "cellphone" => "2222222222",
                "active" => true,
                "role_id" => 2,
            ],
            [
                'name' => 'Daira',
                "lastname" => 'Perez',
                'email' => "dairaperez@gmail.com",
                'password' => Hash::make("dairastudent"),
                "cellphone" => "3333333333",
                "active" => true,
                "role_id" => 3,
            ],
            [
                'name' => 'Paloma',
                "lastname" => 'Portillo',
                'email' => "paloma@gmail.com",
                'password' => Hash::make("palomaparent"),
                "cellphone" => "4444444444",
                "active" => true,
                "role_id" => 4,
            ],

             [
                'name' => 'Rio',
                "lastname" => 'Beckham',
                'email' => "rio@gmail.com",
                'password' => Hash::make("riostudent"),
                "cellphone" => "5555555555",
                "active" => true,
                "role_id" => 3,
             ], 
             [
                "name" => 'Israel',
                "lastname" => "Galvan",
                "email" => "igalvan@gmail.com",
                "password" => Hash::make("isragod"),
                "cellphone" => "6666666666",
                "active" => true,
                "role_id" => 2,
             ],
            [
                "name" => 'Ana Lilia',
                "lastname" => "Hernandez Viesca",
                "email" => "ana@gmail.com",
                "password" => Hash::make("liliana"),
                "cellphone" => "777777777",
                "active" => true,
                "role_id" => 2,
            ]
        ]);
    }
}
