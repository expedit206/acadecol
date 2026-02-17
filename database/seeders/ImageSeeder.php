<?php

namespace Database\Seeders;

use App\Models\Formation;
use App\Models\Image;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    public function run(): void
    {
        // Supprimer les anciennes images
        Image::where('imageable_type', 'App\\Models\\Formation')->delete();

        // Mapping complet des images vers les slugs
        $imageMapping = [
            // --- LANGUES ---
            'francais' => 'storage/formations/francais.png',
            'anglais' => 'storage/formations/anglais.png',
            'espagnol' => 'storage/formations/espagnol.png',
            'allemand' => 'storage/formations/allemand.png',
            'italien' => 'storage/formations/italien.png',
            'chinois' => 'storage/formations/chinois.png',

            // --- PARAMÉDICAL ---
            'delegue-medical' => 'storage/formations/delegue medical.jpg',
            'auxiliaire-vie' => 'storage/formations/auxiliaire de vie.jpg', // ou auxiliaire_vie.png
            'maintenance-biomedicale' => 'storage/formations/maintennace biomedical.jpg',

            // --- HUMANITAIRE ---
            'bases-humanitaire' => 'storage/formations/humanitaire.png',
            'epidemiologie-terrain' => 'storage/formations/epidemiologie.jpg',
            'logistique-humanitaire' => 'storage/formations/logistique humanitaire.jpg',
            'education-urgence' => 'storage/formations/humanitaire.jpg', // Fallback
            'coordination-sanitaire' => 'storage/formations/gestion de projets humanitaire.jpg', // Similar topic
            'info-sanitaire-crise' => 'storage/formations/data analyst sante.jpg', // Data related
            'gestion-projets-humanitaires' => 'storage/formations/gestion de projets humanitaire.jpg',
            'wash-humanitaire' => 'storage/formations/wash humanitaire.jpg',
            'suivi-evaluation-humanitaire' => 'storage/formations/suivi evaluation.jpg',
            'infirmier-humanitaire' => 'storage/formations/humanitaire.png', // Fallback
            'psychologue-humanitaire' => 'storage/formations/humanitaire.jpg', // Fallback
            'fundraising' => 'storage/formations/gestion de projets humanitaire.jpg', // Project related
            'enseignant-humanitaire' => 'storage/formations/humanitaire.png', // Fallback
            'ia-enseignants' => 'storage/formations/ia professionel sante.jpg', // AI related
            'nutrition-humanitaire' => 'storage/formations/nutrition humanitaire.jpg',
            'crec' => 'storage/formations/humanitaire.jpg', // Comms related
            'droit-humanitaire' => 'storage/formations/humanitaire.png', // Fallback

            // --- NUMÉRIQUE EN SANTÉ ---
            'data-analyst' => 'storage/formations/data_analyst.png',
            'community-management' => 'storage/formations/data analyst sante.jpg', // Digital related
            'analyse-donnees-sanitaires' => 'storage/formations/data analyst sante.jpg',
            'cartographie-sig' => 'storage/formations/cartographie sig sante.jpg',
            'ia-sante-cliniciens' => 'storage/formations/ia professionel sante.jpg',
            'ia-sante-publique' => 'storage/formations/ia professionel sante.jpg',

            // --- MANAGEMENT & RECHERCHE ---
            'protocole-recherche' => 'storage/formations/protocol de recherche snate.jpg',
            'enquete-cap' => 'storage/formations/enquete cap sante.jpg',
            'enquete-epidemiologique' => 'storage/formations/epidemiologie.jpg',
            'evaluation-projet-sante' => 'storage/formations/suivi evaluation.jpg',
            'impact-environnemental' => 'storage/formations/wash humanitaire.jpg', // Environment related
            'methodes-diagnostiques' => 'storage/formations/epidemiologie.jpg', // Lab/Research related
            'evaluation-surveillance' => 'storage/formations/evaluation systeme de sante.jpg',
            'bases-epidemiologie' => 'storage/formations/epidemiologie.jpg',
            'bases-evaluation-systeme' => 'storage/formations/evaluation systeme de sante.jpg',
            'planification-sanitaire' => 'storage/formations/gestion de projets humanitaire.jpg', // Planning related
        ];

        foreach ($imageMapping as $slug => $path) {
            $formation = Formation::where('slug', $slug)->first();
            
            if ($formation) {
                Image::create([
                    'imageable_id' => $formation->id,
                    'imageable_type' => 'App\\Models\\Formation',
                    'path' => $path,
                    'is_cover' => true,
                ]);
            }
        }
    }
}
