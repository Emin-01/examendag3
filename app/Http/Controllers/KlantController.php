<?php

namespace App\Http\Controllers;

use App\Models\Gezin;
use Illuminate\Http\Request;

class KlantController extends Controller
{
    public function index(Request $request)
    {
        // Verzamel unieke postcodes voor de dropdown
        $postcodes = \App\Models\Contact::query()->distinct()->pluck('postcode')->sort()->values();

        // Filter gezinnen op postcode indien geselecteerd
        $gezinnen = Gezin::with(['vertegenwoordiger', 'contact'])
            ->when($request->filled('postcode'), function ($query) use ($request) {
                $query->whereHas('contact', function ($q) use ($request) {
                    $q->where('postcode', $request->postcode);
                });
            })
            ->get();

        return view('klanten.index', compact('gezinnen', 'postcodes'));
    }
}
