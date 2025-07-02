<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EetwensSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('eetwensen')->insert([
            ['id' => 1, 'naam' => 'Omnivoor', 'omschrijving' => 'Omnivoor eetwens'],
            ['id' => 2, 'naam' => 'Vegetarisch', 'omschrijving' => 'Vegetarisch eetwens'],
            ['id' => 3, 'naam' => 'Veganistisch', 'omschrijving' => 'Veganistisch eetwens'],
            ['id' => 4, 'naam' => 'GeenVarken', 'omschrijving' => 'Geen varkensvlees eetwens'],
        ]);
    }
}
