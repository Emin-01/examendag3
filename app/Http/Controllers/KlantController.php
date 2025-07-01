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

        // Dummy testdata als er geen echte gezinnen zijn
        if ($gezinnen->isEmpty()) {
            $gezinnen = collect([
                [
                    'id' => 1,
                    'voornaam' => 'Jan',
                    'tussenvoegsel' => 'van',
                    'achternaam' => 'Jansen',
                    'geboortedatum' => '1980-01-01',
                    'type_persoon' => 'Hoofdaanvrager',
                    'vertegenwoordiger' => 'Ja',
                    'straatnaam' => 'Dorpsstraat',
                    'huisnummer' => '1',
                    'toevoeging' => 'A',
                    'postcode' => '1234AB',
                    'woonplaats' => 'Maaskantje',
                    'email' => 'jan.jansen@email.com',
                    'mobiel' => '06-12345678',
                ],
                [
                    'id' => 2,
                    'voornaam' => 'Anja',
                    'tussenvoegsel' => '',
                    'achternaam' => 'Bakker',
                    'geboortedatum' => '1975-05-10',
                    'type_persoon' => 'Partner',
                    'vertegenwoordiger' => 'Nee',
                    'straatnaam' => 'Molenstraat',
                    'huisnummer' => '5',
                    'toevoeging' => '',
                    'postcode' => '1111AA',
                    'woonplaats' => 'Maaskantje',
                    'email' => 'anja.bakker@email.com',
                    'mobiel' => '06-23456789',
                ],
                // Voeg meer testgezinnen toe indien gewenst
            ]);
        }

        return view('klanten.index', [
            'gezinnen' => $gezinnen,
            'postcodes' => $postcodes,
        ]);
    }

    public function show($id)
    {
        // Zoek klant in sessie (na wijziging)
        $klant = session('klant_'.$id);

        // Zoek klant in testdata als niet in sessie
        if (!$klant) {
            $testData = [
                1 => [
                    'id' => 1,
                    'voornaam' => 'Jan',
                    'tussenvoegsel' => 'van',
                    'achternaam' => 'Jansen',
                    'geboortedatum' => '1980-01-01',
                    'type_persoon' => 'Hoofdaanvrager',
                    'vertegenwoordiger' => 'Ja',
                    'straatnaam' => 'Dorpsstraat',
                    'huisnummer' => '1',
                    'toevoeging' => 'A',
                    'postcode' => '1234AB',
                    'woonplaats' => 'Maaskantje',
                    'email' => 'jan.jansen@email.com',
                    'mobiel' => '06-12345678',
                ],
                2 => [
                    'id' => 2,
                    'voornaam' => 'Anja',
                    'tussenvoegsel' => '',
                    'achternaam' => 'Bakker',
                    'geboortedatum' => '1975-05-10',
                    'type_persoon' => 'Partner',
                    'vertegenwoordiger' => 'Nee',
                    'straatnaam' => 'Molenstraat',
                    'huisnummer' => '5',
                    'toevoeging' => '',
                    'postcode' => '1111AA',
                    'woonplaats' => 'Maaskantje',
                    'email' => 'anja.bakker@email.com',
                    'mobiel' => '06-23456789',
                ],
                // Voeg meer testgezinnen toe indien gewenst
            ];
            $klant = $testData[$id] ?? $testData[1];
        }

        return view('klanten.show', compact('klant'));
    }

    public function edit($id)
    {
        // Zoek klant in sessie (na wijziging)
        $klant = session('klant_'.$id);

        // Zoek klant in testdata als niet in sessie
        if (!$klant) {
            $testData = [
                1 => [
                    'id' => 1,
                    'voornaam' => 'Jan',
                    'tussenvoegsel' => 'van',
                    'achternaam' => 'Jansen',
                    'geboortedatum' => '1980-01-01',
                    'type_persoon' => 'Hoofdaanvrager',
                    'vertegenwoordiger' => 'Ja',
                    'straatnaam' => 'Dorpsstraat',
                    'huisnummer' => '1',
                    'toevoeging' => 'A',
                    'postcode' => '1234AB',
                    'woonplaats' => 'Maaskantje',
                    'email' => 'jan.jansen@email.com',
                    'mobiel' => '06-12345678',
                ],
                2 => [
                    'id' => 2,
                    'voornaam' => 'Anja',
                    'tussenvoegsel' => '',
                    'achternaam' => 'Bakker',
                    'geboortedatum' => '1975-05-10',
                    'type_persoon' => 'Partner',
                    'vertegenwoordiger' => 'Nee',
                    'straatnaam' => 'Molenstraat',
                    'huisnummer' => '5',
                    'toevoeging' => '',
                    'postcode' => '1111AA',
                    'woonplaats' => 'Maaskantje',
                    'email' => 'anja.bakker@email.com',
                    'mobiel' => '06-23456789',
                ],
                // Voeg meer testgezinnen toe indien gewenst
            ];
            $klant = $testData[$id] ?? $testData[1];
        }

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
            'tussenvoegsel' => 'nullable',
            'achternaam' => 'required',
            'geboortedatum' => 'nullable',
            'type_persoon' => 'nullable',
            'vertegenwoordiger' => 'nullable',
            'straatnaam' => 'nullable',
            'huisnummer' => 'nullable',
            'toevoeging' => 'nullable',
            'postcode' => 'nullable',
            'woonplaats' => 'nullable',
            'email' => 'required|email',
            'mobiel' => 'nullable',
        ]);

        // Simuleer update: sla ALLE gewijzigde data tijdelijk op in de sessie
        session(['klant_'.$id => $data + ['id' => $id]]);

        // Redirect met melding en na 3 seconden terug naar details
        return redirect()
            ->route('klanten.show', $id)
            ->with('status', 'De klantgegevens zijn gewijzigd');
    }
}
