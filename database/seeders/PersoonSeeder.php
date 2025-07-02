<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersoonSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('personen')->insert([
            ['id' => 1, 'gezin_id' => null, 'voornaam' => 'Hans', 'tussenvoegsel' => 'van', 'achternaam' => 'Leeuwen', 'geboortedatum' => '1958-02-12', 'type_persoon' => 'Manager', 'is_vertegenwoordiger' => 0],
            ['id' => 2, 'gezin_id' => null, 'voornaam' => 'Jan', 'tussenvoegsel' => 'van der', 'achternaam' => 'Sluijs', 'geboortedatum' => '1993-04-30', 'type_persoon' => 'Medewerker', 'is_vertegenwoordiger' => 0],
            ['id' => 3, 'gezin_id' => null, 'voornaam' => 'Herman', 'tussenvoegsel' => 'den', 'achternaam' => 'Duiker', 'geboortedatum' => '1989-08-30', 'type_persoon' => 'Vrijwilliger', 'is_vertegenwoordiger' => 0],
            ['id' => 4, 'gezin_id' => 1, 'voornaam' => 'Johan', 'tussenvoegsel' => 'van', 'achternaam' => 'Zevenhuizen', 'geboortedatum' => '1990-05-20', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 1],
            ['id' => 5, 'gezin_id' => 1, 'voornaam' => 'Sarah', 'tussenvoegsel' => 'den', 'achternaam' => 'Dolder', 'geboortedatum' => '1985-03-23', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 0],
            ['id' => 6, 'gezin_id' => 1, 'voornaam' => 'Theo', 'tussenvoegsel' => null, 'achternaam' => 'Zevenhuizen', 'geboortedatum' => '2015-03-08', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 0],
            ['id' => 7, 'gezin_id' => 1, 'voornaam' => 'Jantien', 'tussenvoegsel' => 'van', 'achternaam' => 'Zevenhuizen', 'geboortedatum' => '2016-09-20', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 0],
            ['id' => 8, 'gezin_id' => 2, 'voornaam' => 'Arjan', 'tussenvoegsel' => null, 'achternaam' => 'Bergkamp', 'geboortedatum' => '1968-07-12', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 1],
            ['id' => 9, 'gezin_id' => 2, 'voornaam' => 'Janneke', 'tussenvoegsel' => null, 'achternaam' => 'Sanders', 'geboortedatum' => '1969-05-11', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 0],
            ['id' => 10, 'gezin_id' => 2, 'voornaam' => 'Stein', 'tussenvoegsel' => null, 'achternaam' => 'Bergkamp', 'geboortedatum' => '2009-02-02', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 0],
            ['id' => 11, 'gezin_id' => 2, 'voornaam' => 'Judith', 'tussenvoegsel' => null, 'achternaam' => 'Bergkamp', 'geboortedatum' => '2022-05-02', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 0],
            ['id' => 12, 'gezin_id' => 3, 'voornaam' => 'Mazin', 'tussenvoegsel' => 'van', 'achternaam' => 'Vliet', 'geboortedatum' => '1968-08-18', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 0],
            ['id' => 13, 'gezin_id' => 3, 'voornaam' => 'Selma', 'tussenvoegsel' => 'de', 'achternaam' => 'Heuvel', 'geboortedatum' => '1965-09-04', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 1],
            ['id' => 14, 'gezin_id' => 4, 'voornaam' => 'Eva', 'tussenvoegsel' => null, 'achternaam' => 'Scherder', 'geboortedatum' => '2000-04-07', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 1],
            ['id' => 15, 'gezin_id' => 4, 'voornaam' => 'Felicia', 'tussenvoegsel' => null, 'achternaam' => 'Scherder', 'geboortedatum' => '2021-11-29', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 0],
            ['id' => 16, 'gezin_id' => 4, 'voornaam' => 'Devin', 'tussenvoegsel' => null, 'achternaam' => 'Scherder', 'geboortedatum' => '2024-03-01', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 0],
            ['id' => 17, 'gezin_id' => 5, 'voornaam' => 'Frieda', 'tussenvoegsel' => null, 'achternaam' => 'de Jong', 'geboortedatum' => '1980-09-04', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 0],
            ['id' => 18, 'gezin_id' => 5, 'voornaam' => 'Simeon', 'tussenvoegsel' => 'de', 'achternaam' => 'Jong', 'geboortedatum' => '2018-05-23', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 1],
            ['id' => 19, 'gezin_id' => 6, 'voornaam' => 'Hanna', 'tussenvoegsel' => 'van der', 'achternaam' => 'Berg', 'geboortedatum' => '1999-09-09', 'type_persoon' => 'Klant', 'is_vertegenwoordiger' => 1],
        ]);
    }
}
