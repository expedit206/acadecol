<?php

namespace Database\Factories;

use App\Models\Formation;
use Illuminate\Database\Eloquent\Factories\Factory;

class FormationDetailFactory extends Factory
{
    public function definition(): array
    {
        $details = [
            [
                'label' => ['fr' => 'Prochaine Rentrée', 'en' => 'Next Intake'],
                'value' => ['fr' => '15 ' . $this->faker->monthName, 'en' => $this->faker->monthName . ' 15']
            ],
            [
                'label' => ['fr' => 'Lieu de Formation', 'en' => 'Training Location'],
                'value' => ['fr' => 'Yaoundé', 'en' => 'Yaoundé']
            ],
            [
                'label' => ['fr' => 'Horaires', 'en' => 'Schedule'],
                'value' => ['fr' => '8h30 - 17h30', 'en' => '8:30 AM - 5:30 PM']
            ],
            [
                'label' => ['fr' => 'Nombre de Places', 'en' => 'Available Spots'],
                'value' => ['fr' => $this->faker->numberBetween(20, 50) . ' places', 'en' => $this->faker->numberBetween(20, 50) . ' spots']
            ],
            [
                'label' => ['fr' => 'Mode de Livraison', 'en' => 'Delivery Mode'],
                'value' => ['fr' => $this->faker->randomElement(['Présentiel', 'Hybride', 'En ligne']), 'en' => $this->faker->randomElement(['In-Person', 'Hybrid', 'Online'])]
            ],
            [
                'label' => ['fr' => 'Frais d\'Inscription', 'en' => 'Registration Fee'],
                'value' => ['fr' => number_format($this->faker->numberBetween(25000, 100000), 0, ',', ' ') . ' FCFA', 'en' => 'FCFA ' . number_format($this->faker->numberBetween(25000, 100000), 0, ',', ' ')]
            ],
            [
                'label' => ['fr' => 'Certificat Reconnu', 'en' => 'Recognized Certificate'],
                'value' => ['fr' => 'Oui', 'en' => 'Yes']
            ],
            [
                'label' => ['fr' => 'Accès à la Plateforme', 'en' => 'Platform Access'],
                'value' => ['fr' => '24/7', 'en' => '24/7']
            ],
        ];
        
        $detail = $details[array_rand($details)];
        
        return [
            'formation_id' => Formation::inRandomOrder()->first()->id ?? Formation::factory()->create()->id,
            'label' => $detail['label'],
            'valeur' => $detail['value'],
            'icon' => $this->faker->randomElement(['heroicon-o-calendar', 'heroicon-o-map-pin', 'heroicon-o-clock', 'heroicon-o-users', 'heroicon-o-document', 'heroicon-o-certificate']),
        ];
    }
}
