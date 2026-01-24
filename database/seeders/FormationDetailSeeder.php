<?php

namespace Database\Seeders;

use App\Models\Formation;
use App\Models\FormationDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormationDetailSeeder extends Seeder
{
    public function run(): void
    {
        $formations = Formation::all();
        
        $detailsTemplates = [
            [
                'label' => ['fr' => 'Prochaine Rentrée', 'en' => 'Next Intake'],
                'valeur_generator' => fn() => [
                    'fr' => fake()->dayOfMonth . ' ' . fake()->monthName,
                    'en' => fake()->monthName . ' ' . fake()->dayOfMonth
                ],
                'icon' => 'heroicon-o-calendar'
            ],
            [
                'label' => ['fr' => 'Lieu de Formation', 'en' => 'Training Location'],
                'valeur_generator' => fn() => [
                    'fr' => fake()->randomElement(['Yaoundé', 'Douala', 'Buea', 'Bafoussam']),
                    'en' => fake()->randomElement(['Yaoundé', 'Douala', 'Buea', 'Bafoussam'])
                ],
                'icon' => 'heroicon-o-map-pin'
            ],
            [
                'label' => ['fr' => 'Horaires', 'en' => 'Schedule'],
                'valeur_generator' => fn() => [
                    'fr' => fake()->randomElement(['8h30 - 17h30', '9h00 - 18h00', '7h00 - 16h00']),
                    'en' => fake()->randomElement(['8:30 AM - 5:30 PM', '9:00 AM - 6:00 PM', '7:00 AM - 4:00 PM'])
                ],
                'icon' => 'heroicon-o-clock'
            ],
            [
                'label' => ['fr' => 'Nombre de Places', 'en' => 'Available Spots'],
                'valeur_generator' => fn() => [
                    'fr' => fake()->numberBetween(15, 50) . ' places',
                    'en' => fake()->numberBetween(15, 50) . ' spots'
                ],
                'icon' => 'heroicon-o-users'
            ],
            [
                'label' => ['fr' => 'Mode de Livraison', 'en' => 'Delivery Mode'],
                'valeur_generator' => fn() => [
                    'fr' => fake()->randomElement(['Présentiel', 'Hybride', 'En ligne']),
                    'en' => fake()->randomElement(['In-Person', 'Hybrid', 'Online'])
                ],
                'icon' => 'heroicon-o-video-camera'
            ],
            [
                'label' => ['fr' => 'Frais d\'Inscription', 'en' => 'Registration Fee'],
                'valeur_generator' => fn() => [
                    'fr' => number_format(fake()->numberBetween(25000, 100000), 0, ',', ' ') . ' FCFA',
                    'en' => 'FCFA ' . number_format(fake()->numberBetween(25000, 100000), 0, ',', ' ')
                ],
                'icon' => 'heroicon-o-currency-dollar'
            ],
            [
                'label' => ['fr' => 'Certificat Reconnu', 'en' => 'Recognized Certificate'],
                'valeur_generator' => fn() => [
                    'fr' => 'Oui - Certification Nationale',
                    'en' => 'Yes - National Certification'
                ],
                'icon' => 'heroicon-o-certificate'
            ],
            [
                'label' => ['fr' => 'Accès à la Plateforme', 'en' => 'Platform Access'],
                'valeur_generator' => fn() => [
                    'fr' => '24/7 - Accès illimité',
                    'en' => '24/7 - Unlimited Access'
                ],
                'icon' => 'heroicon-o-globe-alt'
            ],
            [
                'label' => ['fr' => 'Matériel Fourni', 'en' => 'Materials Provided'],
                'valeur_generator' => fn() => [
                    'fr' => 'Oui - Kits complets inclus',
                    'en' => 'Yes - Complete kits included'
                ],
                'icon' => 'heroicon-o-gift'
            ],
            [
                'label' => ['fr' => 'Support Pédagogique', 'en' => 'Educational Support'],
                'valeur_generator' => fn() => [
                    'fr' => 'Tuteurs qualifiés + Ressources en ligne',
                    'en' => 'Qualified tutors + Online resources'
                ],
                'icon' => 'heroicon-o-book-open'
            ],
            [
                'label' => ['fr' => 'Placement Post-Formation', 'en' => 'Job Placement Support'],
                'valeur_generator' => fn() => [
                    'fr' => 'Assistance à l\'embauche et partenariats',
                    'en' => 'Hiring assistance and partnerships'
                ],
                'icon' => 'heroicon-o-briefcase'
            ],
            [
                'label' => ['fr' => 'Durée Prévue', 'en' => 'Expected Duration'],
                'valeur_generator' => fn() => [
                    'fr' => fake()->randomElement(['6 semaines', '3 mois', '6 mois', '1 an', '2 ans']),
                    'en' => fake()->randomElement(['6 weeks', '3 months', '6 months', '1 year', '2 years'])
                ],
                'icon' => 'heroicon-o-calendar-days'
            ],
        ];
        
        foreach ($formations as $formation) {
            // Créer 6 à 8 détails par formation
            $numDetails = rand(6, 8);
            $selectedDetails = array_rand($detailsTemplates, $numDetails);
            if (!is_array($selectedDetails)) {
                $selectedDetails = [$selectedDetails];
            }
            
            foreach ($selectedDetails as $idx) {
                $template = $detailsTemplates[$idx];
                FormationDetail::create([
                    'formation_id' => $formation->id,
                    'label' => $template['label'],
                    'valeur' => $template['valeur_generator'](),
                    'icon' => $template['icon'],
                ]);
            }
        }
    }
}
