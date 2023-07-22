<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'admin',
            'description' => 'Administrator role',
        ]);

        Role::create([
            'name' => 'moderator',
            'description' => 'Moderator role',
        ]);

        Role::create([
            'name' => 'user',
            'description' => 'Regular user role',
        ]);

        Role::create([
            'name' => 'candidat',
            'description' => 'Candidate role',
        ]);
    }
}
