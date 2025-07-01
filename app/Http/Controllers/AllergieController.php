<?php

namespace App\Http\Controllers;

use App\Models\Allergie;
use App\Models\Gezin;
use Illuminate\Http\Request;

class AllergieController extends Controller
{
    public function index()
    {
        $allergies = Allergie::all();
        $gezinnenMetAllergies = Gezin::with(['personen.allergies', 'contacten'])
            ->whereHas('personen.allergies')
            ->get();
        
        return view('allergies.index', compact('allergies', 'gezinnenMetAllergies'));
    }

    public function filterByAllergie(Request $request)
    {
        $allergieId = $request->input('allergie_id');
        $allergies = Allergie::all();
        
        if ($allergieId) {
            $geselecteerdeAllergie = Allergie::find($allergieId);
            $gezinnenMetAllergies = Gezin::with(['personen.allergies', 'contacten'])
                ->whereHas('personen.allergies', function($query) use ($allergieId) {
                    $query->where('allergies.id', $allergieId);
                })
                ->get();
            
            if ($gezinnenMetAllergies->isEmpty()) {
                $melding = "Er zijn geen gezinnen bekend die de geselecteerde allergie hebben";
                return view('allergies.index', compact('allergies', 'gezinnenMetAllergies', 'melding', 'geselecteerdeAllergie'));
            }
            
            return view('allergies.index', compact('allergies', 'gezinnenMetAllergies', 'geselecteerdeAllergie'));
        }
        
        return redirect()->route('allergies.index');
    }
}
