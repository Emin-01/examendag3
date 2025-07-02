<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactPerLeverancierSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('contact_per_leverancier')->insert([
            ['leverancier_id' => 1, 'contact_id' => 7],   // Albert Heijn - Ruud ter Weijden
            ['leverancier_id' => 2, 'contact_id' => 8],   // Albertus Kerk - Leo Pastoor
            ['leverancier_id' => 3, 'contact_id' => 9],   // Gemeente Utrecht - Mohammed Yazidi
            ['leverancier_id' => 4, 'contact_id' => 10],  // Boerderij Meerhoven - Bertus van Driel
            ['leverancier_id' => 5, 'contact_id' => 14],  // Jan van der Heijden - nu met email/mobiel
            ['leverancier_id' => 6, 'contact_id' => 11],  // Vomar - Jaco Pastorius
            ['leverancier_id' => 7, 'contact_id' => 12],  // DekaMarkt - Sil den Dollaard
            ['leverancier_id' => 8, 'contact_id' => 13],  // Gemeente Vught - Jan Blokker
        ]);
    }
}
