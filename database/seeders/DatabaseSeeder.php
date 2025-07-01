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

        // Voeg gegevens toe aan de tabel allergies
        DB::table('allergies')->insert([
            ['id' => 1, 'naam' => 'Gluten', 'omschrijving' => 'Allergisch voor gluten', 'anafylactisch_risico' => 'zeerlaag'],
            ['id' => 2, 'naam' => 'Pindas', 'omschrijving' => 'Allergisch voor pindas', 'anafylactisch_risico' => 'hoog'],
            ['id' => 3, 'naam' => 'Schaaldieren', 'omschrijving' => 'Allergisch voor schaaldieren', 'anafylactisch_risico' => 'redelijkhoog'],
            ['id' => 4, 'naam' => 'Hazelnoten', 'omschrijving' => 'Allergisch voor hazelnoten', 'anafylactisch_risico' => 'laag'],
            ['id' => 5, 'naam' => 'Lactose', 'omschrijving' => 'Allergisch voor lactose', 'anafylactisch_risico' => 'zeerlaag'],
            ['id' => 6, 'naam' => 'Soja', 'omschrijving' => 'Allergisch voor soja', 'anafylactisch_risico' => 'zeerlaag'],
        ]);

          // Voeg gegevens toe aan de tabel personen
        DB::table('personen')->insert([
            ['gezin_id' => NULL, 'voornaam' => 'Hans', 'tussenvoegsel' => 'van', 'achternaam' => 'Leeuwen', 'geboortedatum' => '1958-02-12', 'type_persoon' => 'Manager', 'is_vertegenwoordiger' => 0],
            ['gezin_id' => NULL, 'voornaam' => 'Jan', 'tussenvoegsel' => 'van der', 'achternaam' => 'Sluijs', 'geboortedatum' => '1993-04-30', 'type_persoon' => 'Medewerker', 'is_vertegenwoordiger' => 0],
            ['gezin_id' => NULL, 'voornaam' => 'Herman', 'tussenvoegsel' => 'den', 'achternaam' => 'Duiker', 'geboortedatum' => '1989-08-30', 'type_persoon' => 'Vrijwilliger', 'is_vertegenwoordiger' => 0],
            ['gezin_id' => 1, 'voornaam' => 'Johan', 'tussenvoegsel' => 'van', 'achternaam' => 'Zevenhuizen', 'geboortedatum' => '1990-05-20', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 1],
            ['gezin_id' => 1, 'voornaam' => 'Sarah', 'tussenvoegsel' => 'den', 'achternaam' => 'Dolder', 'geboortedatum' => '1985-03-23', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 0],
            ['gezin_id' => 1, 'voornaam' => 'Theo', 'tussenvoegsel' => 'van', 'achternaam' => 'Zevenhuizen', 'geboortedatum' => '2015-03-08', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 0],
            ['gezin_id' => 1, 'voornaam' => 'Jantien', 'tussenvoegsel' => 'van', 'achternaam' => 'Zevenhuizen', 'geboortedatum' => '2016-09-20', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 0],
            ['gezin_id' => 2, 'voornaam' => 'Arjan', 'tussenvoegsel' => NULL, 'achternaam' => 'Bergkamp', 'geboortedatum' => '1968-07-12', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 1],
            ['gezin_id' => 2, 'voornaam' => 'Janneke', 'tussenvoegsel' => NULL, 'achternaam' => 'Sanders', 'geboortedatum' => '1969-05-11', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 0],
            ['gezin_id' => 2, 'voornaam' => 'Stein', 'tussenvoegsel' => NULL, 'achternaam' => 'Bergkamp', 'geboortedatum' => '2009-02-02', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 0],
            ['gezin_id' => 2, 'voornaam' => 'Judith', 'tussenvoegsel' => NULL, 'achternaam' => 'Bergkamp', 'geboortedatum' => '2022-02-05', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 0],
            ['gezin_id' => 3, 'voornaam' => 'Mazin', 'tussenvoegsel' => 'van', 'achternaam' => 'Vliet', 'geboortedatum' => '1968-08-18', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 0],
            ['gezin_id' => 3, 'voornaam' => 'Selma', 'tussenvoegsel' => 'van de', 'achternaam' => 'Heuvel', 'geboortedatum' => '1965-09-04', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 1],
            ['gezin_id' => 4, 'voornaam' => 'Eva', 'tussenvoegsel' => NULL, 'achternaam' => 'Scherder', 'geboortedatum' => '2000-04-07', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 1],
            ['gezin_id' => 4, 'voornaam' => 'Felicia', 'tussenvoegsel' => NULL, 'achternaam' => 'Scherder', 'geboortedatum' => '2021-11-29', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 0],
            ['gezin_id' => 4, 'voornaam' => 'Devin', 'tussenvoegsel' => NULL, 'achternaam' => 'Scherder', 'geboortedatum' => '2024-03-01', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 0],
            ['gezin_id' => 5, 'voornaam' => 'Frieda', 'tussenvoegsel' => 'de', 'achternaam' => 'Jong', 'geboortedatum' => '1980-09-04', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 1],
            ['gezin_id' => 5, 'voornaam' => 'Simeon', 'tussenvoegsel' => 'de', 'achternaam' => 'Jong', 'geboortedatum' => '2018-05-23', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 0],
            ['gezin_id' => 6, 'voornaam' => 'Hanna', 'tussenvoegsel' => 'van der', 'achternaam' => 'Berg', 'geboortedatum' => '1999-09-09', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 1],
        ]);

        // Voeg gegevens toe aan de tabel allergie_per_persoon
        DB::table('allergie_per_persoon')->insert([
            ['id' => 1, 'persoon_id' => 4, 'allergie_id' => 1],
            ['id' => 2, 'persoon_id' => 5, 'allergie_id' => 2],
            ['id' => 3, 'persoon_id' => 6, 'allergie_id' => 3],
            ['id' => 4, 'persoon_id' => 7, 'allergie_id' => 4],
            ['id' => 5, 'persoon_id' => 8, 'allergie_id' => 3],
            ['id' => 6, 'persoon_id' => 9, 'allergie_id' => 2],
            ['id' => 7, 'persoon_id' => 10, 'allergie_id' => 5],
            ['id' => 8, 'persoon_id' => 11, 'allergie_id' => 2],
            ['id' => 9, 'persoon_id' => 12, 'allergie_id' => 4],
            ['id' => 10, 'persoon_id' => 13, 'allergie_id' => 1],
            ['id' => 11, 'persoon_id' => 14, 'allergie_id' => 3],
            ['id' => 12, 'persoon_id' => 15, 'allergie_id' => 5],
            ['id' => 13, 'persoon_id' => 16, 'allergie_id' => 1],
            ['id' => 14, 'persoon_id' => 17, 'allergie_id' => 2],
            ['id' => 15, 'persoon_id' => 18, 'allergie_id' => 4],
            ['id' => 16, 'persoon_id' => 19, 'allergie_id' => 4],
        ]);

        // Voeg gegevens toe aan de tabel gezinnen
        DB::table('gezinnen')->insert([
            ['id' => 1, 'naam' => 'ZevenhuizenGezin', 'code' => 'G0001', 'omschrijving' => 'Bijstandsgezin', 'aantal_volwassenen' => 2, 'aantal_kinderen' => 2, 'aantal_babys' => 0, 'totaal_aantal_personen' => 4],
            ['id' => 2, 'naam' => 'BergkampGezin', 'code' => 'G0002', 'omschrijving' => 'Bijstandsgezin', 'aantal_volwassenen' => 2, 'aantal_kinderen' => 1, 'aantal_babys' => 1, 'totaal_aantal_personen' => 4],
            ['id' => 3, 'naam' => 'HeuvelGezin', 'code' => 'G0003', 'omschrijving' => 'Bijstandsgezin', 'aantal_volwassenen' => 2, 'aantal_kinderen' => 0, 'aantal_babys' => 0, 'totaal_aantal_personen' => 2],
            ['id' => 4, 'naam' => 'ScherderGezin', 'code' => 'G0004', 'omschrijving' => 'Bijstandsgezin', 'aantal_volwassenen' => 1, 'aantal_kinderen' => 0, 'aantal_babys' => 2, 'totaal_aantal_personen' => 3],
            ['id' => 5, 'naam' => 'DeJongGezin', 'code' => 'G0005', 'omschrijving' => 'Bijstandsgezin', 'aantal_volwassenen' => 1, 'aantal_kinderen' => 1, 'aantal_babys' => 0, 'totaal_aantal_personen' => 2],
            ['id' => 6, 'naam' => 'VanderBergGezin', 'code' => 'G0006', 'omschrijving' => 'AlleenGaande', 'aantal_volwassenen' => 1, 'aantal_kinderen' => 0, 'aantal_babys' => 0, 'totaal_aantal_personen' => 1],
        ]);

      

        // Voeg ontbrekende personen toe
       DB::table('personen')->insert([
            ['gezin_id' => NULL, 'voornaam' => 'Hans', 'tussenvoegsel' => 'van', 'achternaam' => 'Leeuwen', 'geboortedatum' => '1958-02-12', 'type_persoon' => 'Manager', 'is_vertegenwoordiger' => 0],
            ['gezin_id' => NULL, 'voornaam' => 'Jan', 'tussenvoegsel' => 'van der', 'achternaam' => 'Sluijs', 'geboortedatum' => '1993-04-30', 'type_persoon' => 'Medewerker', 'is_vertegenwoordiger' => 0],
            ['gezin_id' => NULL, 'voornaam' => 'Herman', 'tussenvoegsel' => 'den', 'achternaam' => 'Duiker', 'geboortedatum' => '1989-08-30', 'type_persoon' => 'Vrijwilliger', 'is_vertegenwoordiger' => 0],
            ['gezin_id' => 1, 'voornaam' => 'Johan', 'tussenvoegsel' => 'van', 'achternaam' => 'Zevenhuizen', 'geboortedatum' => '1990-05-20', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 1],
            ['gezin_id' => 1, 'voornaam' => 'Sarah', 'tussenvoegsel' => 'den', 'achternaam' => 'Dolder', 'geboortedatum' => '1985-03-23', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 0],
            ['gezin_id' => 1, 'voornaam' => 'Theo', 'tussenvoegsel' => 'van', 'achternaam' => 'Zevenhuizen', 'geboortedatum' => '2015-03-08', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 0],
            ['gezin_id' => 1, 'voornaam' => 'Jantien', 'tussenvoegsel' => 'van', 'achternaam' => 'Zevenhuizen', 'geboortedatum' => '2016-09-20', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 0],
            ['gezin_id' => 2, 'voornaam' => 'Arjan', 'tussenvoegsel' => null, 'achternaam' => 'Bergkamp', 'geboortedatum' => '1968-07-12', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 1],
            ['gezin_id' => 2, 'voornaam' => 'Janneke', 'tussenvoegsel' => null, 'achternaam' => 'Sanders', 'geboortedatum' => '1969-05-11', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 0],
            ['gezin_id' => 2, 'voornaam' => 'Stein', 'tussenvoegsel' => null, 'achternaam' => 'Bergkamp', 'geboortedatum' => '2009-02-02', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 0],
            ['gezin_id' => 2, 'voornaam' => 'Judith', 'tussenvoegsel' => null, 'achternaam' => 'Bergkamp', 'geboortedatum' => '2022-02-05', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 0],
            ['gezin_id' => 3, 'voornaam' => 'Mazin', 'tussenvoegsel' => 'van', 'achternaam' => 'Vliet', 'geboortedatum' => '1968-08-18', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 0],
            ['gezin_id' => 3, 'voornaam' => 'Selma', 'tussenvoegsel' => 'van de', 'achternaam' => 'Heuvel', 'geboortedatum' => '1965-09-04', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 1],
            ['gezin_id' => 4, 'voornaam' => 'Eva', 'tussenvoegsel' => null, 'achternaam' => 'Scherder', 'geboortedatum' => '2000-04-07', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 1],
            ['gezin_id' => 4, 'voornaam' => 'Felicia', 'tussenvoegsel' => null, 'achternaam' => 'Scherder', 'geboortedatum' => '2021-11-29', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 0],
            ['gezin_id' => 4, 'voornaam' => 'Devin', 'tussenvoegsel' => null, 'achternaam' => 'Scherder', 'geboortedatum' => '2024-03-01', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 0],
            ['gezin_id' => 5, 'voornaam' => 'Frieda', 'tussenvoegsel' => 'de', 'achternaam' => 'Jong', 'geboortedatum' => '1980-09-04', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 1],
            ['gezin_id' => 5, 'voornaam' => 'Simeon', 'tussenvoegsel' => 'de', 'achternaam' => 'Jong', 'geboortedatum' => '2018-05-23', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 0],
            ['gezin_id' => 6, 'voornaam' => 'Hanna', 'tussenvoegsel' => 'van der', 'achternaam' => 'Berg', 'geboortedatum' => '1999-09-09', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 1],
        ]);
    }
}
