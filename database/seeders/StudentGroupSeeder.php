<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StudentGroup;

class StudentGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StudentGroup::insert([
            [
                'student_id' => 3,
                'group_id' => 1,
            ],
            [
                'student_id' => 3,
                'group_id' => 2,
            ],
            [
                'student_id' => 5,
                'group_id' => 1,
            ],
            [
                'student_id' => 5,
                'group_id' => 3,
            ],
            [
                'student_id' => 6,
                'group_id' => 2,
            ],
            [
                'student_id' => 6,
                'group_id' => 3,
            ],
        ]);
    }
}
