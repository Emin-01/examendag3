<?php

namespace App\Http\Controllers;

use App\Models\Allergie;
use App\Models\Gezin;
use Illuminate\Http\Request;

class AllergieController extends Controller
{
    public function index()
    {
        // Haal alle allergieën op
        $allergies = Allergie::all();

        // Haal gezinnen op met personen die allergieën hebben
        $gezinnenMetAllergies = Gezin::with(['personen.allergies'])
            ->whereHas('personen.allergies')
            ->get();

        // Stuur de data naar de view
        return view('allergies.index', compact('allergies', 'gezinnenMetAllergies'));
    }

    public function filterByAllergie(Request $request)
    {
        $allergieId = $request->input('allergie_id');
        $allergies = Allergie::all();

        if ($allergieId) {
            $gezinnenMetAllergies = Gezin::with(['personen.allergies'])
                ->whereHas('personen.allergies', function ($query) use ($allergieId) {
                    $query->where('allergies.id', $allergieId);
                })
                ->get();

            if ($gezinnenMetAllergies->isEmpty()) {
                $melding = "Er zijn geen gezinnen bekend die de geselecteerde allergie hebben";
                return view('allergies.index', compact('allergies', 'gezinnenMetAllergies', 'melding'));
            }

            return view('allergies.index', compact('allergies', 'gezinnenMetAllergies'));
        }

        return redirect()->route('allergies.index');
    }
}

