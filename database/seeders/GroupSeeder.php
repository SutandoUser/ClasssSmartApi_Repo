<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Group::insert([
            [
                'name' => 'Narcologia',
                "owner" => 3,
                'description' => 'No se armo apa',
                'active' => true
            ],
            [
                'name' => 'Tirar Vibra',
                "owner" => 3,
                'description' => 'Tu ya sabe hemano',
                'active' => true
            ],
            [
                'name' => 'Movil',
                "owner" => 3,
                'description' => 'Mejor Cagada Bro',
                'active' => true
            ],
        ]);
    }
}
