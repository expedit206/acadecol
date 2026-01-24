<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = [
            ['fr' => 'Informatique', 'en' => 'Computer Science', 'icon' => 'heroicon-o-computer-desktop'],
            ['fr' => 'Santé', 'en' => 'Health', 'icon' => 'heroicon-o-heart'],
            ['fr' => 'Commerce', 'en' => 'Business', 'icon' => 'heroicon-o-briefcase'],
            ['fr' => 'Ingénierie', 'en' => 'Engineering', 'icon' => 'heroicon-o-wrench'],
            ['fr' => 'Arts & Design', 'en' => 'Arts & Design', 'icon' => 'heroicon-o-paint-brush'],
            ['fr' => 'Langues', 'en' => 'Languages', 'icon' => 'heroicon-o-language'],
            ['fr' => 'Droit', 'en' => 'Law', 'icon' => 'heroicon-o-scale-balance'],
            ['fr' => 'Éducation', 'en' => 'Education', 'icon' => 'heroicon-o-academic-cap'],
        ];
        
        $category = $categories[array_rand($categories)];
        $slug = \Illuminate\Support\Str::slug($category['fr']);
        
        return [
            'nom' => ['fr' => $category['fr'], 'en' => $category['en']],
            'slug' => $slug . '-' . uniqid(),
            'description' => [
                'fr' => 'Formation de qualité dans le domaine de ' . $category['fr'],
                'en' => 'Quality training in the field of ' . $category['en']
            ],
            'ordre_affichage' => $this->faker->numberBetween(1, 100),
            'icon_class' => $category['icon'],
            'parent_id' => null,
        ];
    }
}
