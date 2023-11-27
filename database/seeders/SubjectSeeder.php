<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            ['year_level_id' => 1, 'code' => 'MATH101', 'name' => 'Mathematics'],
            ['year_level_id' => 1, 'code' => 'ENG101', 'name' => 'English'],
            ['year_level_id' => 1, 'code' => 'SCI101', 'name' => 'Science'],
            ['year_level_id' => 1, 'code' => 'HIS101', 'name' => 'History'],
            ['year_level_id' => 1, 'code' => 'GEO101', 'name' => 'Geography'],
            ['year_level_id' => 1, 'code' => 'ART101', 'name' => 'Art'],
            ['year_level_id' => 1, 'code' => 'PHY101', 'name' => 'Physics'],
            ['year_level_id' => 1, 'code' => 'CHEM101', 'name' => 'Chemistry'],
            ['year_level_id' => 1, 'code' => 'COMP101', 'name' => 'Computer Science'],
            ['year_level_id' => 1, 'code' => 'PE101', 'name' => 'Physical Education'],
        ];

        Subject::insert($subjects);
    }
}
