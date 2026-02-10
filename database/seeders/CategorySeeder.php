<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            // 5 domaines principaux selon ACADECOL
            [
                'nom' => ['fr' => 'Les Langues', 'en' => 'Languages'],
                'slug' => 'langues',
                'description' => ['fr' => 'Formations multilingues : Français, Anglais, Espagnol, Allemand, Italien et Chinois. Certifications de compétences linguistiques de A1 à C2.', 'en' => 'Multilingual training: French, English, Spanish, German, Italian and Chinese. Language skills certifications from A1 to C2.'],
                'icon_class' => 'heroicon-o-language',
                'ordre_affichage' => 1,
                'parent_id' => null,
            ],
            [
                'nom' => ['fr' => 'Paramédicale et Biomédical', 'en' => 'Paramedical and Biomedical'],
                'slug' => 'paramedical-biomedical',
                'description' => ['fr' => 'Formations certifiées du Ministère en Pharmacie, Soins aux personnes, Maintenance Biomédicale et Services de Santé.', 'en' => 'Ministry-certified training in Pharmacy, Care Services, Biomedical Maintenance and Health Services.'],
                'icon_class' => 'heroicon-o-heart',
                'ordre_affichage' => 2,
                'parent_id' => null,
            ],
            [
                'nom' => ['fr' => 'L\'Humanitaire', 'en' => 'Humanitarian'],
                'slug' => 'humanitaire',
                'description' => ['fr' => 'Formation en action humanitaire, logistique, coordination et santé d\'urgence.', 'en' => 'Training in humanitarian action, logistics, coordination and emergency health.'],
                'icon_class' => 'heroicon-o-hand-raised',
                'ordre_affichage' => 3,
                'parent_id' => null,
            ],
            [
                'nom' => ['fr' => 'Numérique en Santé', 'en' => 'Digital Health'],
                'slug' => 'numerique-sante',
                'description' => ['fr' => 'Data analyst en santé, cartographie, IA appliquée à la santé publique.', 'en' => 'Health data analyst, mapping, AI applied to public health.'],
                'icon_class' => 'heroicon-o-chart-bar',
                'ordre_affichage' => 4,
                'parent_id' => null,
            ],
            [
                'nom' => ['fr' => 'Management & Recherche Opérationnelle en Santé', 'en' => 'Health Management & Operational Research'],
                'slug' => 'management-recherche-sante',
                'description' => ['fr' => 'Protocoles de recherche, enquêtes épidémiologiques, évaluation de systèmes de santé.', 'en' => 'Research protocols, epidemiological surveys, health system evaluation.'],
                'icon_class' => 'heroicon-o-clip-board',
                'ordre_affichage' => 5,
                'parent_id' => null,
            ]
            
         
        ];

        foreach ($categories as $cat) {
            \App\Models\Category::updateOrCreate(['slug' => $cat['slug']], $cat);
        }
    }
}
