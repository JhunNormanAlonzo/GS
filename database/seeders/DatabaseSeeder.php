<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\SchoolYear;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            YearLevelSeeder::class,
            UserSeeder::class,
            SectionSeeder::class,
            SchoolYearSeeder::class,
            SubjectSeeder::class,
        ]);
    }
}
