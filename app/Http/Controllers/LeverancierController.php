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

        $query = Leverancier::query();

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // Laad de contact-relatie mee
        $leveranciers = $query->with('contact')->get();

        return view('leveranciers.index', compact('leveranciers'));
    }
}

