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

        // Dummy leveranciers
        Leverancier::insert([
            [
                'naam' => 'Voedselbedrijf BV',
                'contactpersoon' => 'Jan Jansen',
                'email' => 'info@voedselbedrijf.nl',
                'mobiel' => '0612345678',
                'leveranciernummer' => 'L1001',
                'type' => 'Bedrijf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'Stichting Hulp',
                'contactpersoon' => 'Piet Pietersen',
                'email' => 'contact@hulpsite.nl',
                'mobiel' => '0687654321',
                'leveranciernummer' => 'L1002',
                'type' => 'Instelling',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'Gemeente Rotterdam',
                'contactpersoon' => 'Sanne de Vries',
                'email' => 'gemeente@rotterdam.nl',
                'mobiel' => '0611122233',
                'leveranciernummer' => 'L1003',
                'type' => 'Overheid',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'Jan de Boer',
                'contactpersoon' => 'Jan de Boer',
                'email' => 'jan@deboer.nl',
                'mobiel' => '0612340000',
                'leveranciernummer' => 'L1004',
                'type' => 'Particulier',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'Donor Stichting',
                'contactpersoon' => 'Karin Donor',
                'email' => 'karin@donorstichting.nl',
                'mobiel' => '0699988877',
                'leveranciernummer' => 'L1005',
                'type' => 'Donor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
