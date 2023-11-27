<?php

namespace Database\Seeders;

use App\Models\SchoolYear;
use Illuminate\Database\Seeder;

class SchoolYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SchoolYear::create([
            'name' => '2022-2023',
            'is_active' => false
        ]);

        SchoolYear::create([
            'name' => '2023-2024',
            'is_active' => true
        ]);
    }
}
