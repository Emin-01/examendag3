<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieenSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categorieen')->insert([
            ['id' => 1, 'naam' => 'Categorie 1', 'omschrijving' => 'Omschrijving 1'],
            ['id' => 2, 'naam' => 'Categorie 2', 'omschrijving' => 'Omschrijving 2'],
            ['id' => 3, 'naam' => 'Categorie 3', 'omschrijving' => 'Omschrijving 3'],
            ['id' => 4, 'naam' => 'Categorie 4', 'omschrijving' => 'Omschrijving 4'],
            ['id' => 5, 'naam' => 'Categorie 5', 'omschrijving' => 'Omschrijving 5'],
        ]);
    }
}
