<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductPerLeverancierSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            [
                'LeverancierId' => 1,
                'ProductId' => 1,
                'DatumAangeleverd' => now()->subDays(10)->format('Y-m-d'),
                'DatumEerstVolgendeLevering' => now()->addDays(10)->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'LeverancierId' => 1,
                'ProductId' => 2,
                'DatumAangeleverd' => now()->subDays(8)->format('Y-m-d'),
                'DatumEerstVolgendeLevering' => now()->addDays(12)->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'LeverancierId' => 1,
                'ProductId' => 3,
                'DatumAangeleverd' => now()->subDays(6)->format('Y-m-d'),
                'DatumEerstVolgendeLevering' => now()->addDays(14)->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'LeverancierId' => 2,
                'ProductId' => 4,
                'DatumAangeleverd' => now()->subDays(5)->format('Y-m-d'),
                'DatumEerstVolgendeLevering' => now()->addDays(15)->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'LeverancierId' => 2,
                'ProductId' => 5,
                'DatumAangeleverd' => now()->subDays(3)->format('Y-m-d'),
                'DatumEerstVolgendeLevering' => now()->addDays(17)->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('productperleverancier')->insert($rows);
    }
}

