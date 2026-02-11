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
        // Mapping des images vers les slugs de formations
        $imageMapping = [
            // LANGUES - Drapeaux
            'francais' => 'storage/formations/francais.png',
            'anglais' => 'storage/formations/anglais.png',
            'toefl-toeic-ielts' => 'storage/formations/anglais.png',
            'espagnol' => 'storage/formations/espagnol.png',
            'allemand' => 'storage/formations/allemand.png',
            'italien' => 'storage/formations/italien.png',
            'chinois' => 'storage/formations/chinois.png',
            
            // PARAMÉDICAL
            'vendeur-pharmacie' => 'storage/formations/vendeu en pharmacie.jpg',
            'delegue-medical' => 'storage/formations/delegue medical.jpg',
            'auxiliaire-vie' => 'storage/formations/auxiliaire_vie.png',
            'maintenance-biomedicale' => 'storage/formations/maintennace biomedical.jpg',
            
            // HUMANITAIRE
            'bases-humanitaire' => 'storage/formations/humanitaire.png',
            'epidemiologie-terrain' => 'storage/formations/epidemiologie.jpg',
            'logistique-humanitaire' => 'storage/formations/logistique humanitaire.jpg',
            'gestion-projets-humanitaires' => 'storage/formations/gestion de projets humanitaire.jpg',
            'wash-humanitaire' => 'storage/formations/wash humanitaire.jpg',
            'nutrition-humanitaire' => 'storage/formations/nutrition humanitaire.jpg',
            
            // NUMÉRIQUE EN SANTÉ
            'data-analyst-sante' => 'storage/formations/data_analyst.png',
            'cartographie-sig-sante' => 'storage/formations/cartographie sig sante.jpg',
            'ia-sante-cliniciens' => 'storage/formations/ia professionel sante.jpg',
            
            // MANAGEMENT & RECHERCHE
            'protocole-recherche' => 'storage/formations/protocol de recherche snate.jpg',
            'enquete-cap' => 'storage/formations/enquete cap sante.jpg',
            'suivi-evaluation' => 'storage/formations/suivi evaluation.jpg',
            'evaluation-systeme-sante' => 'storage/formations/evaluation systeme de sante.jpg',
        ];

        // Supprimer les anciennes images
        Image::where('imageable_type', 'App\\Models\\Formation')->delete();

        // Créer les nouvelles images
        foreach ($imageMapping as $slug => $imagePath) {
            $formation = Formation::where('slug', $slug)->first();
            
            if ($formation) {
                Image::create([
                    'imageable_id' => $formation->id,
                    'imageable_type' => 'App\\Models\\Formation',
                    'path' => $imagePath,
                    'is_cover' => true,
                ]);
            }
        }
    }
}

