<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert([
            [
                'user_id' => 1,
                'role_type' => 'admin'
            ],
            [
                'user_id' => 2,
                'role_type' => 'teacher'
            ],
            [
                'user_id' => 3,
                'role_type' => 'student'
            ],
            [
                'user_id' => 4,
                'role_type' => 'parent'
            ],
        ]);
    }
}
