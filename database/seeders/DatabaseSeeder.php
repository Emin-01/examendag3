<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Leverancier;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'Admin@email.com',
            'password' => bcrypt('password'), // Password is 'password'
        ]);

        // Leveranciers seeder
        $this->call([
            LeverancierSeeder::class,
            ContactSeeder::class,
            ContactPerLeverancierSeeder::class,
        ]);
    }
}
