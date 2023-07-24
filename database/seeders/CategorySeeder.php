<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Homme',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s',
                'image' => 'homme.jpg'
            ],
            [
                'name' => 'Femme',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s',
                'image' => 'femme.jpg'
            ],
            [
                'name' => 'Accessoires',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s',
                'image' => 'accessoires.jpg'
            ],
            [
                'name' => 'Haute Couture',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s',
                'image' => 'Haute Couture.jpg'
            ],
            [
                'name' => 'Enfants',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s',
                'image' => 'enfants.jpg'
            ],
        ];

        foreach ($categories as $category) {
            $imagePath = $this->getImagePath($category['image']);
            Category::create([
                'name' => $category['name'],
                'description' => $category['description'],
                'image' => $imagePath
            ]);
        }
    }

    private function getImagePath($imageName)
    {
        $sourceDirectory = public_path('image\categories'); // Source directory
        $destinationDirectory = 'categories'; // Destination directory within storage/app/public

        // Create the destination directory if it doesn't exist
        if (!file_exists(storage_path('app/' . $destinationDirectory))) {
            mkdir(storage_path('app/' . $destinationDirectory), 0755, true);
        }

        // Generate a unique name for the file
        $uniqueName = md5(uniqid()) . '.' . pathinfo($imageName, PATHINFO_EXTENSION);

        // Move the file to the destination directory using the putFileAs method
        $path = Storage::putFileAs($destinationDirectory, new \Illuminate\Http\File($sourceDirectory . '/' . $imageName), $uniqueName);

        //move them to public
        Storage::disk('public')->put($destinationDirectory . '/' . $uniqueName, file_get_contents($sourceDirectory . '/' . $imageName));

        // Return the file path relative to the storage/app/public directory
        return $destinationDirectory . '/' . $uniqueName;
    }
}
