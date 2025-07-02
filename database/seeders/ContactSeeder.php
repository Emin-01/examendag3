<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        Contact::insert([
            [
                'id' => 7,
                'straat' => 'Siegfried Knutsenlaan',
                'huisnummer' => '234',
                'toevoeging' => null,
                'postcode' => '5271ZE',
                'woonplaats' => 'Maaskantje',
                'email' => 'r.ter.weijden@ah.nl',
                'mobiel' => '+31 623456123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'straat' => 'Theo de Bokstraat',
                'huisnummer' => '256',
                'toevoeging' => null,
                'postcode' => '5271ZH',
                'woonplaats' => 'Maaskantje',
                'email' => 'l.pastoor@gmail.com',
                'mobiel' => '+31 623456123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'straat' => 'Meester van Leerhof',
                'huisnummer' => '2',
                'toevoeging' => 'A',
                'postcode' => '5271ZH',
                'woonplaats' => 'Maaskantje',
                'email' => 'm.yazidi@gemeenteutrecht.nl',
                'mobiel' => '+31 623456123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'straat' => 'Van Wemelenplantsoen',
                'huisnummer' => '300',
                'toevoeging' => null,
                'postcode' => '5271ZH',
                'woonplaats' => 'Maaskantje',
                'email' => 'b.van.driel@gmail.com',
                'mobiel' => '+31 623456123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 11,
                'straat' => 'Terlingenhof',
                'huisnummer' => '20',
                'toevoeging' => null,
                'postcode' => '5271TH',
                'woonplaats' => 'Maaskantje',
                'email' => 'j.pastorius@gmail.com',
                'mobiel' => '+31 623456356',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 12,
                'straat' => 'Veldhoen',
                'huisnummer' => '31',
                'toevoeging' => null,
                'postcode' => '5271ZE',
                'woonplaats' => 'Maaskantje',
                'email' => 's.dollaard@gmail.com',
                'mobiel' => '+31 623452314',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 13,
                'straat' => 'ScheringaDreef',
                'huisnummer' => '37',
                'toevoeging' => null,
                'postcode' => '5271ZE',
                'woonplaats' => 'Vught',
                'email' => 'j.blokker@gemeentevught.nl',
                'mobiel' => '+31 623452314',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 14,
                'straat' => 'Onbekend',
                'huisnummer' => '1',
                'toevoeging' => null,
                'postcode' => '0000AA',
                'woonplaats' => 'Onbekend',
                'email' => null,
                'mobiel' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
