<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leverancier;

class LeverancierController extends Controller
{
    public function index(Request $request)
    {
        // Voeg dummy data toe als de tabel leeg is
        if (Leverancier::count() === 0) {
            Leverancier::insert([
                [
                    'naam' => 'Voedselbedrijf BV',
                    'contactpersoon' => 'Jan Jansen',
                    'leveranciernummer' => 'L1001',
                    'type' => 'Bedrijf',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'naam' => 'Stichting Hulp',
                    'contactpersoon' => 'Piet Pietersen',
                    'leveranciernummer' => 'L1002',
                    'type' => 'Instelling',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'naam' => 'Gemeente Rotterdam',
                    'contactpersoon' => 'Sanne de Vries',
                    'leveranciernummer' => 'L1003',
                    'type' => 'Overheid',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'naam' => 'Jan de Boer',
                    'contactpersoon' => 'Jan de Boer',
                    'leveranciernummer' => 'L1004',
                    'type' => 'Particulier',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'naam' => 'Donor Stichting',
                    'contactpersoon' => 'Karin Donor',
                    'leveranciernummer' => 'L1005',
                    'type' => 'Donor',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }

        // Haal alle unieke types op voor de dropdown
        $leverancierTypes = Leverancier::select('type')->distinct()->pluck('type')->toArray();

        $query = Leverancier::query();

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // Haal leveranciers op, gefilterd op type indien gekozen
        $leveranciers = $query->with('contact')->get();

        // Geef leveranciers en types mee aan de view
        return view('leveranciers.index', [
            'leveranciers' => $leveranciers,
            'leverancierTypes' => $leverancierTypes,
        ]);
    }
}

