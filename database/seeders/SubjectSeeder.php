<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\YearLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $grade_7 = YearLevel::where('name', 'Grade 7')->first();
        $grade_8 = YearLevel::where('name', 'Grade 8')->first();
        $grade_9 = YearLevel::where('name', 'Grade 9')->first();
        $grade_10 = YearLevel::where('name', 'Grade 10')->first();

        $subject7 = [
            [
                'year_level_id' => $grade_7->id,
                'code' => 'ENG7',
                'name' => 'ENGLISH'
            ],
            [
                'year_level_id' => $grade_7->id,
                'code' => 'MTH7',
                'name' => 'MATH,'
            ],
            [
                'year_level_id' => $grade_7->id,
                'code' => 'SCI7',
                'name' => 'SCIENCE,'
            ],
            [
                'year_level_id' => $grade_7->id,
                'code' => 'FIL7',
                'name' => 'FILIPINO,'
            ],
            [
                'year_level_id' => $grade_7->id,
                'code' => 'AP7',
                'name' => 'Araling Panlipunan'
            ],
            [
                'year_level_id' => $grade_7->id,
                'code' => 'TD7',
                'name' => 'Talent Development(TD)'
            ],
            [
                'year_level_id' => $grade_7->id,
                'code' => 'TVE7',
                'name' => 'TVE'
            ],
            [
                'year_level_id' => $grade_7->id,
                'code' => 'ESP7',
                'name' => 'ESP'
            ],
            [
                'year_level_id' => $grade_7->id,
                'code' => 'MPH7',
                'name' => 'MAPEH'
            ],
        ];

        $subject8 = [
            [
                'year_level_id' => $grade_8->id,
                'code' => 'ENG8',
                'name' => 'ENGLISH'
            ],
            [
                'year_level_id' => $grade_8->id,
                'code' => 'MTH8',
                'name' => 'MATH,'
            ],
            [
                'year_level_id' => $grade_8->id,
                'code' => 'SCI8',
                'name' => 'SCIENCE,'
            ],
            [
                'year_level_id' => $grade_8->id,
                'code' => 'FIL8',
                'name' => 'FILIPINO,'
            ],
            [
                'year_level_id' => $grade_8->id,
                'code' => 'AP8',
                'name' => 'Araling Panlipunan'
            ],
            [
                'year_level_id' => $grade_8->id,
                'code' => 'TD8',
                'name' => 'Talent Development(TD)'
            ],
            [
                'year_level_id' => $grade_8->id,
                'code' => 'TVE8',
                'name' => 'TVE'
            ],
            [
                'year_level_id' => $grade_8->id,
                'code' => 'ESP8',
                'name' => 'ESP'
            ],
            [
                'year_level_id' => $grade_8->id,
                'code' => 'MPH8',
                'name' => 'MAPEH'
            ],
        ];

        $subject9 = [
            [
                'year_level_id' => $grade_9->id,
                'code' => 'ENG9',
                'name' => 'ENGLISH'
            ],
            [
                'year_level_id' => $grade_9->id,
                'code' => 'MTH9',
                'name' => 'MATH,'
            ],
            [
                'year_level_id' => $grade_9->id,
                'code' => 'SCI9',
                'name' => 'SCIENCE,'
            ],
            [
                'year_level_id' => $grade_9->id,
                'code' => 'FIL9',
                'name' => 'FILIPINO,'
            ],
            [
                'year_level_id' => $grade_9->id,
                'code' => 'AP9',
                'name' => 'Araling Panlipunan'
            ],
            [
                'year_level_id' => $grade_9->id,
                'code' => 'ENT9',
                'name' => 'ENTREP'
            ],
            [
                'year_level_id' => $grade_9->id,
                'code' => 'ICF9',
                'name' => 'ICF'
            ],
            [
                'year_level_id' => $grade_9->id,
                'code' => 'TVE9',
                'name' => 'TVE'
            ],
            [
                'year_level_id' => $grade_9->id,
                'code' => 'ESP9',
                'name' => 'ESP'
            ],
            [
                'year_level_id' => $grade_9->id,
                'code' => 'MPH9',
                'name' => 'MAPEH'
            ],
        ];


        $subject10 = [
            [
                'year_level_id' => $grade_10->id,
                'code' => 'ENG10',
                'name' => 'ENGLISH'
            ],
            [
                'year_level_id' => $grade_10->id,
                'code' => 'MTH10',
                'name' => 'MATH,'
            ],
            [
                'year_level_id' => $grade_10->id,
                'code' => 'SCI10',
                'name' => 'SCIENCE,'
            ],
            [
                'year_level_id' => $grade_10->id,
                'code' => 'FIL10',
                'name' => 'FILIPINO,'
            ],
            [
                'year_level_id' => $grade_10->id,
                'code' => 'AP10',
                'name' => 'Araling Panlipunan'
            ],
            [
                'year_level_id' => $grade_10->id,
                'code' => 'ENT10',
                'name' => 'ENTREP'
            ],
            [
                'year_level_id' => $grade_10->id,
                'code' => 'ICF10',
                'name' => 'ICF'
            ],
            [
                'year_level_id' => $grade_10->id,
                'code' => 'TVE10',
                'name' => 'TVE'
            ],
            [
                'year_level_id' => $grade_10->id,
                'code' => 'ESP10',
                'name' => 'ESP'
            ],
            [
                'year_level_id' => $grade_10->id,
                'code' => 'MPH10',
                'name' => 'MAPEH'
            ],
        ];


        Subject::insert($subject7);
        Subject::insert($subject8);
        Subject::insert($subject9);
        Subject::insert($subject10);
    }
}
