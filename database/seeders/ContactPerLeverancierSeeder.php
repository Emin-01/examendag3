<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactPerLeverancierSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('contactperleverancier')->insert([
            ['LeverancierId' => 1, 'ContactId' => 7],
            ['LeverancierId' => 2, 'ContactId' => 8],
            ['LeverancierId' => 3, 'ContactId' => 9],
            ['LeverancierId' => 4, 'ContactId' => 10],
            ['LeverancierId' => 6, 'ContactId' => 11],
            ['LeverancierId' => 7, 'ContactId' => 12],
            ['LeverancierId' => 8, 'ContactId' => 13],
        ]);
    }
}
