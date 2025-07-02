<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Leverancier;

class LeverancierSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'naam' => 'Albert Heijn',
                'contactpersoon' => 'Ruud ter Weijden',
                'leveranciernummer' => 'L0001',
                'type' => 'Bedrijf',
                'email' => 'r.ter.weijden@ah.nl',
                'mobiel' => '+31 623456123',
            ],
            [
                'id' => 2,
                'naam' => 'Albertus Kerk',
                'contactpersoon' => 'Leo Pastoor',
                'leveranciernummer' => 'L0002',
                'type' => 'Instelling',
                'email' => 'l.pastoor@gmail.com',
                'mobiel' => '+31 623456123',
            ],
            [
                'id' => 3,
                'naam' => 'Gemeente Utrecht',
                'contactpersoon' => 'Mohammed Yazidi',
                'leveranciernummer' => 'L0003',
                'type' => 'Overheid',
                'email' => 'm.yazidi@gemeenteutrecht.nl',
                'mobiel' => '+31 623456123',
            ],
            [
                'id' => 4,
                'naam' => 'Boerderij Meerhoven',
                'contactpersoon' => 'Bertus van Driel',
                'leveranciernummer' => 'L0004',
                'type' => 'Particulier',
                'email' => 'b.van.driel@gmail.com',
                'mobiel' => '+31 623456123',
            ],
            [
                'id' => 5,
                'naam' => 'Jan van der Heijden',
                'contactpersoon' => 'Jan van der Heijden',
                'leveranciernummer' => 'L0005',
                'type' => 'Donor',
                'email' => 'jan.vdheijden@gmail.com',
                'mobiel' => '+31 612345678',
            ],
            [
                'id' => 6,
                'naam' => 'Vomar',
                'contactpersoon' => 'Jaco Pastorius',
                'leveranciernummer' => 'L0006',
                'type' => 'Bedrijf',
                'email' => 'j.pastorius@gmail.com',
                'mobiel' => '+31 623456356',
            ],
            [
                'id' => 7,
                'naam' => 'DekaMarkt',
                'contactpersoon' => 'Sil den Dollaard',
                'leveranciernummer' => 'L0007',
                'type' => 'Bedrijf',
                'email' => 's.dollaard@gmail.com',
                'mobiel' => '+31 623452314',
            ],
            [
                'id' => 8,
                'naam' => 'Gemeente Vught',
                'contactpersoon' => 'Jan Blokker',
                'leveranciernummer' => 'L0008',
                'type' => 'Overheid',
                'email' => 'j.blokker@gemeentevught.nl',
                'mobiel' => '+31 623452314',
            ],
        ];

        foreach ($data as $row) {
            Leverancier::updateOrCreate(['id' => $row['id']], $row);
        }
    }
}