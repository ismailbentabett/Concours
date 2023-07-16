<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Homme'],
            ['name' => 'Femme'],
            ['name' => 'Vêtements'],
            ['name' => 'Chaussures'],
            ['name' => 'Accessoires'],
            ['name' => 'Sacs'],
            ['name' => 'Bijoux'],
            ['name' => 'Maillots de bain'],
            ['name' => 'Lingerie'],
            ['name' => 'Montres'],
            ['name' => 'Chapeaux'],
            ['name' => 'Gants'],
            ['name' => 'Cravates'],
            ['name' => 'Bottes'],
            ['name' => 'Jupes'],
            ['name' => 'Enfants'],

        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
