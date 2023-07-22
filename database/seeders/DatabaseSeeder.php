<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(CategorySeeder::class);

       // Seed roles
       \App\Models\Role::create(['name' => 'admin', 'description' => 'Administrator role']);
       \App\Models\Role::create(['name' => 'moderator', 'description' => 'Moderator role']);
       \App\Models\Role::create(['name' => 'user', 'description' => 'Regular user role']);
       \App\Models\Role::create(['name' => 'candidat', 'description' => 'Candidate role']);

       // Seed regular users using the User factory
       \App\Models\User::factory(10)->create();

       // Create an admin user using the User factory and assign the 'admin' role
       \App\Models\User::factory()->admin()->create([
           'name' => 'admin',
           'email' => 'admin@admin.com',
           'password' => bcrypt('admin'), // Replace 'password' with the desired password for the admin user
       ]);
    }
}
