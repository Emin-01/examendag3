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
                    'email' => 'info@voedselbedrijf.nl',
                    'mobiel' => '0612345678',
                    'leveranciernummer' => 'L1001',
                    'type' => 'Bedrijf',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'naam' => 'Stichting Hulp',
                    'contactpersoon' => 'Piet Pietersen',
                    'email' => 'contact@hulpsite.nl',
                    'mobiel' => '0687654321',
                    'leveranciernummer' => 'L1002',
                    'type' => 'Instelling',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'naam' => 'Gemeente Rotterdam',
                    'contactpersoon' => 'Sanne de Vries',
                    'email' => 'gemeente@rotterdam.nl',
                    'mobiel' => '0611122233',
                    'leveranciernummer' => 'L1003',
                    'type' => 'Overheid',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'naam' => 'Jan de Boer',
                    'contactpersoon' => 'Jan de Boer',
                    'email' => 'jan@deboer.nl',
                    'mobiel' => '0612340000',
                    'leveranciernummer' => 'L1004',
                    'type' => 'Particulier',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'naam' => 'Donor Stichting',
                    'contactpersoon' => 'Karin Donor',
                    'email' => 'karin@donorstichting.nl',
                    'mobiel' => '0699988877',
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
        $leveranciers = $query->get();
        return view('leveranciers.index', compact('leveranciers'));
    }
}
