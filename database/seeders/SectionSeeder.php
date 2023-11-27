<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = [
            'A',
            'B',
            'C',
            'D',
            'E',
            'F',
            'G',
            'H',
        ];
        $x = 1;
        foreach ($sections as $section) {
            DB::table('sections')->insert([
                'year_level_id' => $x,
                'name' => $section,
            ]);
            $x++;
            if ($x == 4) {
                $x = 1;
            }
        }
    }
}
