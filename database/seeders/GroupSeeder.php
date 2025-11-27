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
                "owner" => 2,
                'description' => 'No se armo apa',
                'active' => true
            ],
            [
                'name' => 'Tirar Vibra',
                "owner" => 2,
                'description' => 'Tu ya sabe hemano',
                'active' => true
            ],
            [
                'name' => 'Movil',
                "owner" => 2,
                'description' => 'Mejor Cagada Bro',
                'active' => true
            ],
        ]);
    }
}
