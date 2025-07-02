<?php
namespace App\Http\Controllers;

use App\Models\Gezin;
use App\Models\Allergie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Persoon;


class AllergieController extends Controller
{
    public function overzicht(Request $request)
    {
        // Haal alle allergieën op
        $allergies = Allergie::all();

        // Haal de geselecteerde allergie-ID op uit de request
        $allergieId = $request->input('allergie_id');

        // Haal gezinnen op met hun personen en allergieën
        $gezinnen = \App\Models\Gezin::with(['personen.allergies'])
            ->when($allergieId, function ($query) use ($allergieId) {
                $query->whereHas('personen.allergies', function ($q) use ($allergieId) {
                    $q->where('allergies.id', $allergieId);
                });
            })
            ->get();

        // Stuur de data naar de juiste view
        return view('allergie.overzicht', compact('gezinnen', 'allergies'));
    }

    public function edit($id)
    {
        $persoon = Persoon::findOrFail($id);
        $allergies = Allergie::all();
        return view('allergie.edit', compact('persoon', 'allergies'));
    }

    public function update(Request $request, $id)
    {
        $persoon = Persoon::findOrFail($id);
        $allergieId = $request->input('allergie_id');

        // Update de allergie in de pivot-tabel
        $persoon->allergies()->sync([$allergieId]);

        return redirect()->route('allergie.overzicht')->with('success', 'De wijziging is doorgevoerd');
    }

    public function details($id)
    {
        $gezin = Gezin::with('personen.allergies')->findOrFail($id);
        return view('allergie.details', ['gezinnen' => $gezin]);
    }

    public function updateDetails(Request $request, $id)
    {
        $persoon = Persoon::findOrFail($id);
        $request->validate([
            'allergie_id' => 'required|exists:allergies,id',
        ]);
        $persoon->allergie_id = $request->allergie_id;
        $persoon->save();

        return redirect()->route('allergie.overzicht')->with('success', 'Allergie bijgewerkt.');
    }
}

