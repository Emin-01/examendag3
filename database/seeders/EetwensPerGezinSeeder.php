<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EetwensPerGezinSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('eetwens_per_gezin')->insert([
            ['id' => 1, 'gezin_id' => 1, 'eetwens_id' => 2],
            ['id' => 2, 'gezin_id' => 2, 'eetwens_id' => 4],
            ['id' => 3, 'gezin_id' => 3, 'eetwens_id' => 4],
            ['id' => 4, 'gezin_id' => 4, 'eetwens_id' => 3],
            ['id' => 5, 'gezin_id' => 5, 'eetwens_id' => 2],
        ]);
    }
}
