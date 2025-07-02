<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'naam' => 'Aardappel',
                'soortallergie' => null,
                'barcode' => '8719587321239',
                'houdbaarheidsdatum' => '2024-07-12',
            ],
            [
                'naam' => 'Aardappel',
                'soortallergie' => null,
                'barcode' => '8719587321239',
                'houdbaarheidsdatum' => '2024-07-26',
            ],
            [
                'naam' => 'Ui',
                'soortallergie' => null,
                'barcode' => '8719437321335',
                'houdbaarheidsdatum' => '2024-09-02',
            ],
            [
                'naam' => 'Appel',
                'soortallergie' => null,
                'barcode' => '8719486321332',
                'houdbaarheidsdatum' => '2024-08-16',
            ],
            [
                'naam' => 'Appel',
                'soortallergie' => null,
                'barcode' => '8719486321332',
                'houdbaarheidsdatum' => '2024-09-23',
            ],
            [
                'naam' => 'Banaan',
                'soortallergie' => 'Banaan',
                'barcode' => '8719484321336',
                'houdbaarheidsdatum' => '2024-07-12',
            ],
            [
                'naam' => 'Banaan',
                'soortallergie' => 'Banaan',
                'barcode' => '8719484321336',
                'houdbaarheidsdatum' => '2024-07-19',
            ],
            [
                'naam' => 'Kaas',
                'soortallergie' => 'Lactose',
                'barcode' => '8719487421338',
                'houdbaarheidsdatum' => '2024-09-19',
            ],
            [
                'naam' => 'Rosbief',
                'soortallergie' => null,
                'barcode' => '8719487421331',
                'houdbaarheidsdatum' => '2024-07-23',
            ],
            [
                'naam' => 'Melk',
                'soortallergie' => 'Lactose',
                'barcode' => '8719487121331',
                'houdbaarheidsdatum' => '2024-07-23',
            ],
            [
                'naam' => 'Margarine',
                'soortallergie' => null,
                'barcode' => '8719486321336',
                'houdbaarheidsdatum' => '2024-08-02',
            ],
            [
                'naam' => 'Ei',
                'soortallergie' => 'Eier',
                'barcode' => '8719487421334',
                'houdbaarheidsdatum' => '2024-08-04',
            ],
            [
                'naam' => 'Brood',
                'soortallergie' => 'Gluten',
                'barcode' => '8719487721331',
                'houdbaarheidsdatum' => '2024-07-07',
            ],
            [
                'naam' => 'Gevulde Koek',
                'soortallergie' => 'Amandel',
                'barcode' => '8719483321333',
                'houdbaarheidsdatum' => '2024-09-04',
            ],
            [
                'naam' => 'Fristi',
                'soortallergie' => 'Lactose',
                'barcode' => '8719487121331',
                'houdbaarheidsdatum' => '2024-10-28',
            ],
            [
                'naam' => 'Appelsap',
                'soortallergie' => null,
                'barcode' => '8719487521331',
                'houdbaarheidsdatum' => '2024-09-10',
            ],
            [
                'naam' => 'Koffie',
                'soortallergie' => 'Caffeine',
                'barcode' => '8719487381338',
                'houdbaarheidsdatum' => '2024-10-23',
            ],
            [
                'naam' => 'Thee',
                'soortallergie' => 'Theïne',
                'barcode' => '8719487329339',
                'houdbaarheidsdatum' => '2024-09-02',
            ],
            [
                'naam' => 'Pasta',
                'soortallergie' => 'Gluten',
                'barcode' => '8719487321332',
                'houdbaarheidsdatum' => '2024-12-16',
            ],
            [
                'naam' => 'Rijst',
                'soortallergie' => null,
                'barcode' => '8719487331332',
                'houdbaarheidsdatum' => '2024-12-25',
            ],
            [
                'naam' => 'Knorr Nasi Mix',
                'soortallergie' => null,
                'barcode' => '8719487531535',
                'houdbaarheidsdatum' => '2024-12-13',
            ],
            [
                'naam' => 'Tomatensoep',
                'soortallergie' => null,
                'barcode' => '8719487331337',
                'houdbaarheidsdatum' => '2024-12-01',
            ],
            [
                'naam' => 'Tomatensaus',
                'soortallergie' => null,
                'barcode' => '8719487341334',
                'houdbaarheidsdatum' => '2024-12-21',
            ],
            [
                'naam' => 'Peterselie',
                'soortallergie' => null,
                'barcode' => '8719487321636',
                'houdbaarheidsdatum' => '2024-07-31',
            ],
            [
                'naam' => 'Olie',
                'soortallergie' => null,
                'barcode' => '8719487327347',
                'houdbaarheidsdatum' => '2024-12-27',
            ],
            [
                'naam' => 'Mars',
                'soortallergie' => null,
                'barcode' => '8719487324334',
                'houdbaarheidsdatum' => '2024-11-12',
            ],
            [
                'naam' => 'Biscuit',
                'soortallergie' => null,
                'barcode' => '8719487321332',
                'houdbaarheidsdatum' => '2024-08-07',
            ],
            [
                'naam' => 'Paprika Chips',
                'soortallergie' => null,
                'barcode' => '8719487321839',
                'houdbaarheidsdatum' => '2024-09-04',
            ],
            [
                'naam' => 'Chocolade reep',
                'soortallergie' => 'Cacoa',
                'barcode' => '8719487321533',
                'houdbaarheidsdatum' => '2024-11-21',
            ],
        ];

        foreach ($data as $row) {
            Product::create($row);
        }
    }
}
