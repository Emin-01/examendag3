<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'Admin@admin.com',
            'password' => bcrypt('password'), // Password is 'password'
        ]);

        // Voeg dummy gezinnen toe
        DB::table('gezinnen')->insert([
            // ...bestaande gezinnen...
        ]);

        // Voeg dummy personen toe
        DB::table('personen')->insert([
            [
                'gezin_id' => 1,
                'voornaam' => 'Piet',
                'tussenvoegsel' => null,
                'achternaam' => 'Bakker',
                'geboortedatum' => '1980-05-12',
                'type_persoon' => 'Klant',
                'is_vertegenwoordiger' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gezin_id' => 2,
                'voornaam' => 'Fatma',
                'tussenvoegsel' => null,
                'achternaam' => 'Yilmaz',
                'geboortedatum' => '1975-09-23',
                'type_persoon' => 'Klant',
                'is_vertegenwoordiger' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gezin_id' => 3,
                'voornaam' => 'Linda',
                'tussenvoegsel' => null,
                'achternaam' => 'Jansen',
                'geboortedatum' => '1990-03-15',
                'type_persoon' => 'Klant',
                'is_vertegenwoordiger' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gezin_id' => 4,
                'voornaam' => 'Kees',
                'tussenvoegsel' => null,
                'achternaam' => 'Visser',
                'geboortedatum' => '1985-07-08',
                'type_persoon' => 'Klant',
                'is_vertegenwoordiger' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
