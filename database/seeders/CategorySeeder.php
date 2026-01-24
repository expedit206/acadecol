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
            ],
            
            // Sous-catégories pour Langues
            [
                'nom' => ['fr' => 'Français', 'en' => 'French'],
                'slug' => 'francais',
                'description' => ['fr' => 'Tous les niveaux A1 à C2', 'en' => 'All levels A1 to C2'],
                'icon_class' => 'heroicon-o-language',
                'ordre_affichage' => 1,
                'parent_id' => 1,
            ],
            [
                'nom' => ['fr' => 'Anglais', 'en' => 'English'],
                'slug' => 'anglais',
                'description' => ['fr' => 'Tous les niveaux + TOEFL/TOEIC/IELTS', 'en' => 'All levels + TOEFL/TOEIC/IELTS'],
                'icon_class' => 'heroicon-o-language',
                'ordre_affichage' => 2,
                'parent_id' => 1,
            ],
            [
                'nom' => ['fr' => 'Espagnol', 'en' => 'Spanish'],
                'slug' => 'espagnol',
                'description' => ['fr' => 'Niveaux A1 à C1', 'en' => 'Levels A1 to C1'],
                'icon_class' => 'heroicon-o-language',
                'ordre_affichage' => 3,
                'parent_id' => 1,
            ],
            [
                'nom' => ['fr' => 'Allemand', 'en' => 'German'],
                'slug' => 'allemand',
                'description' => ['fr' => 'Niveaux A1 à C1', 'en' => 'Levels A1 to C1'],
                'icon_class' => 'heroicon-o-language',
                'ordre_affichage' => 4,
                'parent_id' => 1,
            ],
            [
                'nom' => ['fr' => 'Italien', 'en' => 'Italian'],
                'slug' => 'italien',
                'description' => ['fr' => 'Niveaux A1 à C2', 'en' => 'Levels A1 to C2'],
                'icon_class' => 'heroicon-o-language',
                'ordre_affichage' => 5,
                'parent_id' => 1,
            ],
            [
                'nom' => ['fr' => 'Chinois', 'en' => 'Chinese'],
                'slug' => 'chinois',
                'description' => ['fr' => 'Niveaux A1 à C1', 'en' => 'Levels A1 to C1'],
                'icon_class' => 'heroicon-o-language',
                'ordre_affichage' => 6,
                'parent_id' => 1,
            ],
            
            // Sous-catégories pour Paramédicale
            [
                'nom' => ['fr' => 'Pharmacie', 'en' => 'Pharmacy'],
                'slug' => 'pharmacie',
                'description' => ['fr' => 'Vendeur en pharmacie, gestion pharmaceutique', 'en' => 'Pharmacy salesperson, pharmaceutical management'],
                'icon_class' => 'heroicon-o-cube',
                'ordre_affichage' => 1,
                'parent_id' => 2,
            ],
            [
                'nom' => ['fr' => 'Délégué Médical', 'en' => 'Medical Delegate'],
                'slug' => 'delegue-medical',
                'description' => ['fr' => 'Formation de représentant médical', 'en' => 'Medical representative training'],
                'icon_class' => 'heroicon-o-briefcase',
                'ordre_affichage' => 2,
                'parent_id' => 2,
            ],
            [
                'nom' => ['fr' => 'Auxiliaire de Vie', 'en' => 'Care Giver'],
                'slug' => 'auxiliaire-vie',
                'description' => ['fr' => '12 mois - Services aux personnes', 'en' => '12 months - Personal care services'],
                'icon_class' => 'heroicon-o-heart',
                'ordre_affichage' => 3,
                'parent_id' => 2,
            ],
            [
                'nom' => ['fr' => 'Maintenance Biomédicale', 'en' => 'Biomedical Maintenance'],
                'slug' => 'maintenance-biomedical',
                'description' => ['fr' => '12 mois - Entretien équipements médicaux', 'en' => '12 months - Medical equipment maintenance'],
                'icon_class' => 'heroicon-o-wrench-screwdriver',
                'ordre_affichage' => 4,
                'parent_id' => 2,
            ],
            
            // Sous-catégories pour Humanitaire
            [
                'nom' => ['fr' => 'Bases Humanitaires', 'en' => 'Humanitarian Basics'],
                'slug' => 'bases-humanitaires',
                'description' => ['fr' => 'Fondamentaux de l\'action humanitaire', 'en' => 'Fundamentals of humanitarian action'],
                'icon_class' => 'heroicon-o-hand-raised',
                'ordre_affichage' => 1,
                'parent_id' => 3,
            ],
            [
                'nom' => ['fr' => 'Épidémiologie & Urgences', 'en' => 'Epidemiology & Emergencies'],
                'slug' => 'epidemiologie-urgences',
                'description' => ['fr' => 'Épidémiologie de terrain et urgences sanitaires', 'en' => 'Field epidemiology and health emergencies'],
                'icon_class' => 'heroicon-o-chart-bar',
                'ordre_affichage' => 2,
                'parent_id' => 3,
            ],
            [
                'nom' => ['fr' => 'Logistique Humanitaire', 'en' => 'Humanitarian Logistics'],
                'slug' => 'logistique-humanitaire',
                'description' => ['fr' => 'Gestion logistique en contexte humanitaire', 'en' => 'Logistics management in humanitarian context'],
                'icon_class' => 'heroicon-o-truck',
                'ordre_affichage' => 3,
                'parent_id' => 3,
            ],
            [
                'nom' => ['fr' => 'Santé Mentale & Psychosocial', 'en' => 'Mental Health & Psychosocial'],
                'slug' => 'sante-mentale-psychosocial',
                'description' => ['fr' => 'Soutien psychosocial en contexte de crise', 'en' => 'Psychosocial support in crisis context'],
                'icon_class' => 'heroicon-o-face-smile',
                'ordre_affichage' => 4,
                'parent_id' => 3,
            ],
        ];

        foreach ($categories as $cat) {
            \App\Models\Category::updateOrCreate(['slug' => $cat['slug']], $cat);
        }
    }
}
