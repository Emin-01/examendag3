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
                'naam' => 'Albert Heijn',
                'contactpersoon' => 'Ruud ter Weijden',
                'leveranciernummer' => 'L0001',
                'type' => 'Bedrijf',
            ],
            [
                'naam' => 'Albertus Kerk',
                'contactpersoon' => 'Leo Pastoor',
                'leveranciernummer' => 'L0002',
                'type' => 'Instelling',
            ],
            [
                'naam' => 'Gemeente Utrecht',
                'contactpersoon' => 'Mohammed Yazidi',
                'leveranciernummer' => 'L0003',
                'type' => 'Overheid',
            ],
            [
                'naam' => 'Boerderij Meerhoven',
                'contactpersoon' => 'Bertus van Driel',
                'leveranciernummer' => 'L0004',
                'type' => 'Particulier',
            ],
            [
                'naam' => 'Jan van der Heijden',
                'contactpersoon' => 'Jan van der Heijden',
                'leveranciernummer' => 'L0005',
                'type' => 'Donor',
            ],
            [
                'naam' => 'Vomar',
                'contactpersoon' => 'Jaco Pastorius',
                'leveranciernummer' => 'L0006',
                'type' => 'Bedrijf',
            ],
            [
                'naam' => 'DekaMarkt',
                'contactpersoon' => 'Sil den Dollaard',
                'leveranciernummer' => 'L0007',
                'type' => 'Bedrijf',
            ],
            [
                'naam' => 'Gemeente Vught',
                'contactpersoon' => 'Jan Blokker',
                'leveranciernummer' => 'L0008',
                'type' => 'Overheid',
            ],
        ];
        foreach ($data as $row) {
            Leverancier::create($row);
        }
    }
}
