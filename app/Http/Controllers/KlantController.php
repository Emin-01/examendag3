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

    public function show($id)
    {
        // Haal gewijzigde klant uit sessie als die er is, anders dummy data
        $klant = session('klant_'.$id) ?? [
            'id' => $id,
            'voornaam' => 'Jan',
            'tussenvoegsel' => '',
            'achternaam' => 'Jansen',
            'geboortedatum' => '1980-01-01',
            'type_persoon' => 'Hoofdaanvrager',
            'vertegenwoordiger' => 'Ja',
            'straatnaam' => 'Dorpsstraat',
            'huisnummer' => '1',
            'toevoeging' => '',
            'postcode' => '1234AB',
            'woonplaats' => 'Maaskantje',
            'email' => 'jan.jansen@email.com',
            'mobiel' => '06-12345678',
        ];
        return view('klanten.show', compact('klant'));
    }

    public function edit($id)
    {
        // Dummy klant voor test
        $klant = [
            'id' => $id,
            'voornaam' => 'Jan',
            'tussenvoegsel' => '',
            'achternaam' => 'Jansen',
            'geboortedatum' => '1980-01-01',
            'type_persoon' => 'Hoofdaanvrager',
            'vertegenwoordiger' => 'Ja',
            'straatnaam' => 'Dorpsstraat',
            'huisnummer' => '1',
            'toevoeging' => '',
            'postcode' => '1234AB',
            'woonplaats' => 'Maaskantje',
            'email' => 'jan.jansen@email.com',
            'mobiel' => '06-12345678',
        ];
        // Als er oude input is (na submit), vul die in
        foreach ($klant as $key => $value) {
            if (old($key) !== null) {
                $klant[$key] = old($key);
            }
        }
        return view('klanten.edit', compact('klant'));
    }

    public function update(Request $request, $id)
    {
        // Simuleer validatie
        $data = $request->validate([
            'voornaam' => 'required',
            'achternaam' => 'required',
            'email' => 'required|email',
            // ...andere velden indien gewenst...
        ]);

        // Simuleer update: sla gewijzigde data tijdelijk op in de sessie
        session(['klant_'.$id => $data + ['id' => $id]]);

        // Redirect met melding en na 3 seconden terug naar details
        return redirect()
            ->route('klanten.show', $id)
            ->with('status', 'De klantgegevens zijn gewijzigd');
    }
}
