<?php

namespace Database\Factories;

use App\Models\Formation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    public function definition(): array
    {
        return [
            'imageable_id' => Formation::inRandomOrder()->first()->id ?? Formation::factory()->create()->id,
            'imageable_type' => 'App\Models\Formation',
            'path' => '/images/formations/formation-' . $this->faker->numberBetween(1, 20) . '.jpg',
            'is_cover' => $this->faker->boolean(30),
        ];
    }
}
