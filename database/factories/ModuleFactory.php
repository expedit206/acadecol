<?php

namespace Database\Factories;

use App\Models\Formation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModuleFactory extends Factory
{
    public function definition(): array
    {
        $modules = [
            // Modules génériques
            ['fr' => 'Introduction et Fondamentaux', 'en' => 'Introduction and Fundamentals'],
            ['fr' => 'Concepts Avancés', 'en' => 'Advanced Concepts'],
            ['fr' => 'Travaux Pratiques', 'en' => 'Practical Work'],
            ['fr' => 'Projets Capstone', 'en' => 'Capstone Projects'],
            ['fr' => 'Préparation Professionnelle', 'en' => 'Professional Preparation'],
            ['fr' => 'Cas d\'Étude Réels', 'en' => 'Real Case Studies'],
            ['fr' => 'Outils et Technologies', 'en' => 'Tools and Technologies'],
            ['fr' => 'Développement de Compétences', 'en' => 'Skill Development'],
            ['fr' => 'Gestion de Projet', 'en' => 'Project Management'],
            ['fr' => 'Évaluation et Certification', 'en' => 'Evaluation and Certification'],
        ];
        
        $module = $modules[array_rand($modules)];
        
        return [
            'formation_id' => Formation::inRandomOrder()->first()->id ?? Formation::factory()->create()->id,
            'titre' => [
                'fr' => $module['fr'],
                'en' => $module['en']
            ],
            'contenu' => [
                'fr' => $this->faker->paragraphs(3, true),
                'en' => $this->faker->paragraphs(3, true)
            ],
            'ordre' => $this->faker->numberBetween(1, 10),
        ];
    }
}
