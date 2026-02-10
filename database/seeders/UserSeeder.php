<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin principal unique
        User::create([
            'name' => 'Admin Principal',
            'email' => 'admin@acadecol.cm',
            'password' => bcrypt('Admin@123'),
            'email_verified_at' => now(),
        ]);
    }
}
