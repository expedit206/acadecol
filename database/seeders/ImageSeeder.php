<?php

namespace Database\Seeders;

use App\Models\Formation;
use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    public function run(): void
    {
        $formations = Formation::all();
        
        $imagePaths = [
            '/images/formations/informatique-1.jpg',
            '/images/formations/informatique-2.jpg',
            '/images/formations/sante-1.jpg',
            '/images/formations/sante-2.jpg',
            '/images/formations/commerce-1.jpg',
            '/images/formations/commerce-2.jpg',
            '/images/formations/ingenierie-1.jpg',
            '/images/formations/ingenierie-2.jpg',
            '/images/formations/arts-1.jpg',
            '/images/formations/arts-2.jpg',
            '/images/formations/langues-1.jpg',
            '/images/formations/langues-2.jpg',
            '/images/formations/education-1.jpg',
            '/images/formations/education-2.jpg',
            '/images/formations/droit-1.jpg',
            '/images/formations/droit-2.jpg',
        ];
        
        foreach ($formations as $formation) {
            // Créer 2 à 4 images par formation
            $numImages = rand(2, 4);
            for ($i = 0; $i < $numImages; $i++) {
                $isCover = $i === 0; // La première image est la couverture
                Image::create([
                    'imageable_id' => $formation->id,
                    'imageable_type' => 'App\Models\Formation',
                    'path' => $imagePaths[array_rand($imagePaths)],
                    'is_cover' => $isCover,
                ]);
            }
        }
    }
}
