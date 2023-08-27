<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Jhun Norman Alonzo',
            'email' => 'jalonzo@diavox.net',
            'password' => bcrypt('admin123')
        ]);
        $admin->assignRole('admin');


        $branch_id = Branch::select('id')->inRandomOrder()->first()->id;
        $branch_head = User::create([
            'branch_id' => $branch_id,
            'name' => 'Jessa Mae Matutino',
            'email' => 'jessamaematutino@gmail.com',
            'password' => bcrypt('admin123')
        ]);
        $branch_head->assignRole('branch-head');

        $branch_id = Branch::select('id')->inRandomOrder()->first()->id;
        $branch_head = User::create([
            'branch_id' => $branch_id,
            'name' => 'Emar',
            'email' => 'emar@gmail.com',
            'password' => bcrypt('admin123')
        ]);
        $branch_head->assignRole('branch-head');

        $branch_id = Branch::select('id')->inRandomOrder()->first()->id;
        $branch_head = User::create([
            'branch_id' => $branch_id,
            'name' => 'jovy',
            'email' => 'jovy@gmail.com',
            'password' => bcrypt('admin123')
        ]);
        $branch_head->assignRole('branch-head');


        $branch_id = Branch::select('id')->inRandomOrder()->first()->id;
        $branch_head = User::create([
            'branch_id' => $branch_id,
            'name' => 'maj',
            'email' => 'maj@gmail.com',
            'password' => bcrypt('admin123')
        ]);
        $branch_head->assignRole('branch-head');
    }
}
