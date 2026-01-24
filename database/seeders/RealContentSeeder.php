<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Formation;
use App\Models\Module;
use Illuminate\Support\Str;

class RealContentSeeder extends Seeder
{
    public function run()
    {
        // Disable foreign key checks to allow truncation
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Module::truncate();
        Formation::truncate();
        Category::truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $categoriesData = [
            [
                'nom' => ['fr' => 'Diplômes nationaux d’Etat', 'en' => 'National State Diploma'],
                'description' => ['fr' => 'Formations en Présentiel - 12 mois', 'en' => 'In-person training - 12 months'],
                'icon_class' => 'fas fa-graduation-cap',
                'formations' => [
                    ['titre' => ['fr' => 'Vendeur en Pharmacie', 'en' => 'Pharmacy Salesperson'], 'duree' => '12 mois/months'],
                    ['titre' => ['fr' => 'Délégué ou Visiteur médical', 'en' => 'Medical Delegate'], 'duree' => '12 mois/months'],
                    ['titre' => ['fr' => 'Auxiliaire de Vie', 'en' => 'Care Givers'], 'duree' => '12 mois/months'],
                    ['titre' => ['fr' => 'Maintenance Biomédicale', 'en' => 'Biomedical Maintenance'], 'duree' => '12 mois/months'],
                    ['titre' => ['fr' => 'Analyste des Données', 'en' => 'Data Analyst'], 'duree' => '12 mois/months'],
                    ['titre' => ['fr' => 'Community Management', 'en' => 'Community Management'], 'duree' => '12 mois/months'],
                    ['titre' => ['fr' => 'Langues (Français, Anglais, Espagnol, Allemand, Italien, Chinois)', 'en' => 'Languages (French, English, Spanish, German, Italian, Chinese)'], 'duree' => 'Varié'],
                ]
            ],
            [
                'nom' => ['fr' => 'Certificats de compétences linguistiques', 'en' => 'Language Skills Certificates'],
                'description' => ['fr' => '3 à 6 mois en présentiel ou en ligne', 'en' => '3 to 6 months in-person or online'],
                'icon_class' => 'fas fa-language',
                'formations' => [
                    ['titre' => ['fr' => 'Français (Tous niveaux A1-C2)', 'en' => 'French (All levels A1-C2)'], 'duree' => '3-6 mois'],
                    ['titre' => ['fr' => 'Anglais (Préparation TOEFL/TOEIC/IELTS)', 'en' => 'English (TOEFL/TOEIC/IELTS Prep)'], 'duree' => '3-6 mois'],
                    ['titre' => ['fr' => 'Espagnol (A1-C1)', 'en' => 'Spanish (A1-C1)'], 'duree' => '3-6 mois'],
                    ['titre' => ['fr' => 'Italien (A1-C2)', 'en' => 'Italian (A1-C2)'], 'duree' => '3-6 mois'],
                    ['titre' => ['fr' => 'Allemand (A1-C1)', 'en' => 'German (A1-C1)'], 'duree' => '3-6 mois'],
                    ['titre' => ['fr' => 'Chinois (A1-C2)', 'en' => 'Chinese (A1-C2)'], 'duree' => '3-6 mois'],
                ]
            ],
            [
                'nom' => ['fr' => 'Certificats de compétences humanitaires', 'en' => 'Humanitarian Skills Certificate'],
                'description' => ['fr' => 'En ligne', 'en' => 'Online'],
                'icon_class' => 'fas fa-hand-holding-heart',
                'formations' => [
                    ['titre' => ['fr' => 'Les bases de l’Humanitaire', 'en' => 'Fundamentals of Humanitarian']],
                    ['titre' => ['fr' => 'Epidémiologie de terrain et urgences sanitaire', 'en' => 'Field Epidemiology and Health Emergencies']],
                    ['titre' => ['fr' => 'Logistique humanitaire', 'en' => 'Humanitarian Logistics']],
                    ['titre' => ['fr' => 'Education en situation d’urgence (ESU)', 'en' => 'Education in Emergencies (EIE)']],
                    ['titre' => ['fr' => 'Coordination de l’action sanitaire en situation de crise', 'en' => 'Coordination of Health Emergencies']],
                    ['titre' => ['fr' => 'Management de l’information sanitaire en situation de Crise', 'en' => 'Health Information Management in Emergencies']],
                    ['titre' => ['fr' => 'Gestions de projets humanitaires', 'en' => 'Humanitarian Project Management']],
                    ['titre' => ['fr' => 'Les bases du Wash Humanitaire', 'en' => 'The fundamental of WaSH in humanitarian context']],
                    ['titre' => ['fr' => 'Suivi-Evaluation et recevabilité', 'en' => 'M&E and Accountability']],
                    ['titre' => ['fr' => 'L’infirmier dans l’humanitaire', 'en' => 'Nursing in humanitarian context']],
                    ['titre' => ['fr' => 'Psychologue humanitaire et santé mentale', 'en' => 'Humanitarian Psychologist and Mental Health']],
                    ['titre' => ['fr' => 'Mobilisation des ressources (Fundraising)', 'en' => 'Resource mobilization (Fundraising)']],
                    ['titre' => ['fr' => 'Enseignant humanitaire', 'en' => 'Humanitarian teacher']],
                    ['titre' => ['fr' => 'IA pour les Enseignants', 'en' => 'AI for Teachers']],
                    ['titre' => ['fr' => 'Nutrition Humanitaire', 'en' => 'Nutrition in humanitarian context']],
                    ['titre' => ['fr' => 'Communication des risques et engagement communautaire', 'en' => 'Risk communication and Community Engagement']],
                    ['titre' => ['fr' => 'Les bases du droit humanitaire', 'en' => 'The basics of humanitarian law']],
                ]
            ],
            [
                'nom' => ['fr' => 'Numérique appliqué à la Santé Publique', 'en' => 'Digital Skills applied to Public Health'],
                'description' => ['fr' => 'Certificat de compétences - Présentiel ou En ligne', 'en' => 'Skills Certificate - In-person or Online'],
                'icon_class' => 'fas fa-laptop-medical',
                'formations' => [
                    ['titre' => ['fr' => 'Data analyst / Data scientist', 'en' => 'Data analyst / Data scientist']],
                    ['titre' => ['fr' => 'Analyse des données sanitaires (Excel, SPSS, DHIS2, R, Python...)', 'en' => 'Health Data Analysis (Excel, SPSS, DHIS2, R, Python...)']],
                    ['titre' => ['fr' => 'Logiciels de Cartographie (QGIS, ArcGIS)', 'en' => 'Public Health Mapping Software (QGIS, ArcGIS)']],
                    ['titre' => ['fr' => 'IA pour Professionnels de la Santé Cliniciens', 'en' => 'AI for Clinical Health Professionals']],
                    ['titre' => ['fr' => 'IA pour Experts Santé publique', 'en' => 'AI for Public Health Experts']],
                ]
            ],
            [
                'nom' => ['fr' => 'Management & Recherche Opérationnelle en Santé', 'en' => 'Health Management & Operational Research'],
                'description' => ['fr' => 'Certificat de compétences - Présentiel et En ligne', 'en' => 'Skills Certificate - In-person and Online'],
               'icon_class' => 'fas fa-briefcase-medical',
                'formations' => [
                    ['titre' => ['fr' => 'Conception d’un protocole de recherche en santé', 'en' => 'Designing Health Research protocol']],
                    ['titre' => ['fr' => 'Conduite d’une enquête CAP', 'en' => 'Conducting a KAP survey']],
                    ['titre' => ['fr' => 'Conduite d’enquêtes épidémiologiques', 'en' => 'Conducting Epidemiological survey']],
                    ['titre' => ['fr' => 'Conduite d’une évaluation de projet et programme de Santé', 'en' => 'Conducting health project/program Evaluation']],
                    ['titre' => ['fr' => 'Conduite d’une Evaluation d’Impact Environnementale', 'en' => 'Conducting Environmental Impact Evaluation']],
                    ['titre' => ['fr' => 'Conduite d’une évaluation des méthodes diagnostiques', 'en' => 'Conducting an Evaluation of Diagnostic Methods']],
                    ['titre' => ['fr' => 'Evaluation d’un système de Surveillance épidémiologique', 'en' => 'Evaluation of Epi-Surveillance System']],
                    ['titre' => ['fr' => 'Les bases de l’épidémiologie de terrain', 'en' => 'Fundamentals of Basic Field epidemiology']],
                    ['titre' => ['fr' => 'Les bases de l’évaluation d’un système de santé', 'en' => 'Fundamentals of health System Evaluation']],
                    ['titre' => ['fr' => 'Les bases de la planification sanitaire', 'en' => 'Fundamentals of Health planning']],
                ]
            ],
        ];

        foreach ($categoriesData as $index => $catData) {
            $category = Category::create([
                'nom' => $catData['nom'],
                'description' => $catData['description'],
                'slug' => Str::slug($catData['nom']['fr']),
                'icon_class' => $catData['icon_class'], // Added mapping
                'ordre_affichage' => $index + 1,
            ]);

            foreach ($catData['formations'] as $formData) {
                Formation::create([
                    'category_id' => $category->id,
                    'titre' => $formData['titre'],
                    'slug' => Str::slug($formData['titre']['fr']) . '-' . rand(100, 999),
                    'duree' => $formData['duree'] ?? null,
                    'description_courte' => ['fr' => 'Formation certifiante ACADECOL', 'en' => 'ACADECOL certified training'],
                    'is_featured' => rand(0, 1) === 1,
                ]);
            }
        }

    }
}
