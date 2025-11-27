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
                'name' => 'User',
                "lastname" => 'Admin',
                'email' => "admin@insano.com",
                'password' => Hash::make("admin1"),
                "cellphone" => "1111111111",
                "active" => true
            ]]);

        User::insert([
            [
                'name' => 'User',
                "lastname" => 'Teacher',
                'email' => "teacher@insano.com",
                'password' => Hash::make("teacher1"),
                "cellphone" => "2222222222",
                "active" => true
            ] 
        ]);
           
        User::insert([
             [
                'name' => 'User',
                "lastname" => 'Student',
                'email' => "studen@insano.com",
                'password' => Hash::make("student1"),
                "cellphone" => "3333333333",
                "active" => true
            ]
        ]);
        User::insert([[
                'name' => 'User',
                "lastname" => 'Parent',
                'email' => "parent@insano.com",
                'password' => Hash::make("parent1"),
                "cellphone" => "4444444444",
                "active" => true
            ]
        ]);

        User::insert([
             [
                'name' => 'Yeve',
                "lastname" => 'Rino',
                'email' => "yeve@insano.com",
                'password' => Hash::make("yeve1234"),
                "cellphone" => "5555555555",
                "active" => true
            ]
        ]);

        User::insert([[
                "name" => 'benito',
                "lastname" => "camela",
                "email" => "camela@gmail.com",
                "password" => Hash::make("benito1234"),
                "cellphone" => "6666666666",
                "active" => true
            ]]);
    }
}
