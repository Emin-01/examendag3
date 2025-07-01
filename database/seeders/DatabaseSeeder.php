<?php

namespace Database\Seeders;

use App\Models\User;
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
        
            }
        }

        DB::table('gezinnen')->insert([
            [
                'id' => 1,
                'naam' => 'ZevenhuizenGezin',
                'code' => 'G0001',
                'omschrijving' => 'Bijstandsgezin',
                'aantal_volwassenen' => 2,
                'aantal_kinderen' => 2,
                'aantal_babys' => 0,
                'totaal_aantal_personen' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'naam' => 'BergkampGezin',
                'code' => 'G0002',
                'omschrijving' => 'Bijstandsgezin',
                'aantal_volwassenen' => 2,
                'aantal_kinderen' => 1,
                'aantal_babys' => 1,
                'totaal_aantal_personen' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'naam' => 'HeuvelGezin',
                'code' => 'G0003',
                'omschrijving' => 'Bijstandsgezin',
                'aantal_volwassenen' => 2,
                'aantal_kinderen' => 0,
                'aantal_babys' => 0,
                'totaal_aantal_personen' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'naam' => 'ScherderGezin',
                'code' => 'G0004',
                'omschrijving' => 'Bijstandsgezin',
                'aantal_volwassenen' => 1,
                'aantal_kinderen' => 0,
                'aantal_babys' => 2,
                'totaal_aantal_personen' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'naam' => 'DeJongGezin',
                'code' => 'G0005',
                'omschrijving' => 'Bijstandsgezin',
                'aantal_volwassenen' => 1,
                'aantal_kinderen' => 1,
                'aantal_babys' => 0,
                'totaal_aantal_personen' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'naam' => 'VanderBergGezin',
                'code' => 'G0006',
                'omschrijving' => 'AlleenGaande',
                'aantal_volwassenen' => 1,
                'aantal_kinderen' => 0,
                'aantal_babys' => 0,
                'totaal_aantal_personen' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
