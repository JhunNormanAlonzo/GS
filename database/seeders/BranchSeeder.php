<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array = array("Sta. Ana", "Gonzaga", "Buguey", "Pattao", "Aparri", "Magapit", "Gattaran", "Ballesteros", "Sanchez Mira", "Claveria");
        foreach ($array as $arr) {
            Branch::create([
                'name' => $arr
            ]);
        }


        // Branch::factory(10)->create();
    }
}
