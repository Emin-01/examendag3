<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class GezinController extends Controller
{
    public function index()
    {
        $gezinnen = DB::table('gezinnen')
            ->select(
                'gezinnen.*',
                DB::raw('(SELECT CONCAT(voornaam, " ", IFNULL(tussenvoegsel, ""), " ", achternaam) FROM personen WHERE personen.gezin_id = gezinnen.id AND is_vertegenwoordiger = 1 LIMIT 1) as vertegenwoordiger')
            )
            ->get();

        return view('voedselpakketen.overzicht', compact('gezinnen'));
    }
}
