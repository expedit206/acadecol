<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seeders de base
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
        ]);

        // Créer 30+ formations avec données logiques
        $this->call([
            FormationSeeder::class,
            ModuleSeeder::class,
            FormationDetailSeeder::class,
            ImageSeeder::class,
        ]);
    }
}
