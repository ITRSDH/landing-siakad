<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create default test user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Call all model seeders
        $this->call([
            ProfilKampusSeeder::class,
            LandingContentSeeder::class,
            BeritaSeeder::class,
            PengumumanSeeder::class,
            GaleriSeeder::class,
            FaqSeeder::class,
            BeasiswaSeeder::class,
            OrmawaSeeder::class,
            PrestasiSeeder::class,
        ]);
    }
}
