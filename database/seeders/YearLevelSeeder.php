<?php

namespace Database\Seeders;

use App\Models\YearLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class YearLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        YearLevel::create([
            'name' => 'Grade 11'
        ]);

        YearLevel::create([
            'name' => 'Grade 12'
        ]);

        YearLevel::create([
            'name' => '1st Year'
        ]);

        YearLevel::create([
            'name' => '2nd Year'
        ]);

        YearLevel::create([
            'name' => '3rd Year'
        ]);

        YearLevel::create([
            'name' => '4th Year'
        ]);
    }
}