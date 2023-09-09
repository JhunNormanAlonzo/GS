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
        Subject::create([
            'code' => 'ENG1',
            'name' => 'English 1',
        ]);

        Subject::create([
            'code' => 'MATH1',
            'name' => 'Mathematics 1',
        ]);

        Subject::create([
            'code' => 'Fil1',
            'name' => 'Filipino 1',
        ]);

        Subject::create([
            'code' => 'AP1',
            'name' => 'Araling Panlipunan 1',
        ]);

        Subject::create([
            'code' => 'ESP1',
            'name' => 'Edukasyon sa Pagkakatao 1',
        ]);

        Subject::create([
            'code' => 'MAPEH1',
            'name' => 'Music Arts Physical Education Health 1',
        ]);

        Subject::create([
            'code' => 'SCI1',
            'name' => 'SCIENCE 1',
        ]);
    }
}
