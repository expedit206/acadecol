<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin principal
        User::create([
            'name' => 'Admin Principal',
            'email' => 'admin@acadecol.cm',
            'password' => bcrypt('Admin@123'),
            'email_verified_at' => now(),
        ]);

        // Autres admins
        $adminNames = [
            'Admin Académique',
            'Responsable Informatique',
            'Responsable Santé',
            'Responsable Commerce',
        ];

        foreach ($adminNames as $i => $name) {
            User::create([
                'name' => $name,
                'email' => 'admin' . ($i + 2) . '@acadecol.cm',
                'password' => bcrypt('password123'),
                'email_verified_at' => now(),
            ]);
        }

        // Utilisateurs standards - 20+
        $firstNames = ['Jean', 'Marie', 'Pierre', 'Sophie', 'Luc', 'Anne', 'Marc', 'Isabelle', 'Michel', 'Catherine', 
                      'Paul', 'Claire', 'David', 'Françoise', 'Laurent', 'Monique', 'Jacques', 'Nicole', 'Francis', 'Chantal'];
        $lastNames = ['Durand', 'Martin', 'Bernard', 'Robert', 'Richard', 'Petit', 'Dubois', 'Laurent', 'Simon', 'Michel',
                     'Garcia', 'Rodriguez', 'Moreau', 'Thomas', 'Schmit', 'Blanc', 'Gontier', 'Fontaine', 'Vincent', 'Fournier'];

        $counter = 1;
        foreach ($firstNames as $i => $firstName) {
            $lastName = $lastNames[$i % count($lastNames)];
            
            User::create([
                'name' => $firstName . ' ' . $lastName,
                'email' => 'user' . $counter . '@acadecol.cm',
                'password' => bcrypt('password123'),
                'email_verified_at' => now(),
            ]);
            $counter++;
        }
    }
}
