<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductPerLeverancierFullSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            // Uit screenshot, alle leveranciers en producten
            [ 'LeverancierId' => 4, 'ProductId' => 1,  'DatumAangeleverd' => '2024-04-12', 'DatumEerstVolgendeLevering' => '2024-05-12'],
            [ 'LeverancierId' => 4, 'ProductId' => 2,  'DatumAangeleverd' => '2024-03-02', 'DatumEerstVolgendeLevering' => '2024-04-02'],
            [ 'LeverancierId' => 2, 'ProductId' => 3,  'DatumAangeleverd' => '2024-07-16', 'DatumEerstVolgendeLevering' => '2024-08-16'],
            [ 'LeverancierId' => 1, 'ProductId' => 4,  'DatumAangeleverd' => '2024-02-12', 'DatumEerstVolgendeLevering' => '2024-03-12'],
            [ 'LeverancierId' => 4, 'ProductId' => 5,  'DatumAangeleverd' => '2024-05-19', 'DatumEerstVolgendeLevering' => '2024-06-19'],
            [ 'LeverancierId' => 1, 'ProductId' => 6,  'DatumAangeleverd' => '2024-06-23', 'DatumEerstVolgendeLevering' => '2024-07-23'],
            [ 'LeverancierId' => 4, 'ProductId' => 7,  'DatumAangeleverd' => '2024-06-20', 'DatumEerstVolgendeLevering' => '2024-07-20'],
            [ 'LeverancierId' => 4, 'ProductId' => 8,  'DatumAangeleverd' => '2024-05-02', 'DatumEerstVolgendeLevering' => '2024-06-02'],
            [ 'LeverancierId' => 4, 'ProductId' => 9,  'DatumAangeleverd' => '2022-12-04', 'DatumEerstVolgendeLevering' => '2024-01-04'],
            [ 'LeverancierId' => 3, 'ProductId' => 10, 'DatumAangeleverd' => '2024-03-07', 'DatumEerstVolgendeLevering' => '2024-04-07'],
            [ 'LeverancierId' => 3, 'ProductId' => 11, 'DatumAangeleverd' => '2024-02-04', 'DatumEerstVolgendeLevering' => '2024-03-04'],
            [ 'LeverancierId' => 3, 'ProductId' => 12, 'DatumAangeleverd' => '2024-02-28', 'DatumEerstVolgendeLevering' => '2024-03-28'],
            [ 'LeverancierId' => 3, 'ProductId' => 13, 'DatumAangeleverd' => '2024-03-19', 'DatumEerstVolgendeLevering' => '2024-04-19'],
            [ 'LeverancierId' => 3, 'ProductId' => 14, 'DatumAangeleverd' => '2024-03-23', 'DatumEerstVolgendeLevering' => '2024-04-23'],
            [ 'LeverancierId' => 2, 'ProductId' => 15, 'DatumAangeleverd' => '2024-02-02', 'DatumEerstVolgendeLevering' => '2024-03-02'],
            [ 'LeverancierId' => 2, 'ProductId' => 16, 'DatumAangeleverd' => '2024-02-16', 'DatumEerstVolgendeLevering' => '2024-03-16'],
            [ 'LeverancierId' => 1, 'ProductId' => 17, 'DatumAangeleverd' => '2024-03-25', 'DatumEerstVolgendeLevering' => '2024-04-25'],
            [ 'LeverancierId' => 1, 'ProductId' => 18, 'DatumAangeleverd' => '2024-03-13', 'DatumEerstVolgendeLevering' => '2024-04-13'],
            [ 'LeverancierId' => 1, 'ProductId' => 19, 'DatumAangeleverd' => '2024-03-23', 'DatumEerstVolgendeLevering' => '2024-04-23'],
            [ 'LeverancierId' => 1, 'ProductId' => 20, 'DatumAangeleverd' => '2024-02-21', 'DatumEerstVolgendeLevering' => '2024-03-21'],
            [ 'LeverancierId' => 2, 'ProductId' => 21, 'DatumAangeleverd' => '2024-03-31', 'DatumEerstVolgendeLevering' => '2024-04-30'],
            [ 'LeverancierId' => 1, 'ProductId' => 22, 'DatumAangeleverd' => '2024-03-27', 'DatumEerstVolgendeLevering' => '2024-04-27'],
            [ 'LeverancierId' => 3, 'ProductId' => 23, 'DatumAangeleverd' => '2024-04-11', 'DatumEerstVolgendeLevering' => '2024-04-18'],
            [ 'LeverancierId' => 4, 'ProductId' => 24, 'DatumAangeleverd' => '2024-04-07', 'DatumEerstVolgendeLevering' => '2024-04-14'],
            [ 'LeverancierId' => 2, 'ProductId' => 25, 'DatumAangeleverd' => '2024-05-07', 'DatumEerstVolgendeLevering' => '2024-05-14'],
            [ 'LeverancierId' => 2, 'ProductId' => 26, 'DatumAangeleverd' => '2024-05-05', 'DatumEerstVolgendeLevering' => '2024-05-12'],
        ];

        foreach ($rows as &$row) {
            $row['created_at'] = now();
            $row['updated_at'] = now();
        }

        DB::table('productperleverancier')->insert($rows);
    }
}
