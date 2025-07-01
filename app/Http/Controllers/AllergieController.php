<?php
namespace App\Http\Controllers;

use App\Models\Gezin;
use App\Models\Allergie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AllergieController extends Controller
{
    public function overzicht(Request $request)
    {
        // Haal alle gezinnen op met hun personen en allergieën



        // Haal alle allergieën op
        $allergies = Allergie::all();

        // Haal de geselecteerde allergie-ID op uit de request
        $allergieId = $request->input('allergie_id');

        // Haal gezinnen op met hun personen en allergieën
        $gezinnen = Gezin::with(['personen.allergies'])
            ->when($allergieId, function ($query) use ($allergieId) {
                $query->whereHas('personen.allergies', function ($q) use ($allergieId) {
                    $q->where('allergies.id', $allergieId);
                });
            })
            ->get();

        // Stuur de data naar de juiste view
        return view('allergie.overzicht', compact('gezinnen', 'allergies'));
    }
}
