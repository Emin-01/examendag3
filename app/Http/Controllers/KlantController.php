<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KlantController extends Controller
{
    private function getTestData()
    {
        return [
            1 => [
                'id' => 1,
                'naam' => 'ZevenhuizenGezin',
                'vertegenwoordiger' => [
                    'voornaam' => 'Johan',
                    'tussenvoegsel' => 'van',
                    'achternaam' => 'Zevenhuizen',
                    'geboortedatum' => '1990-05-20',
                    'type_persoon' => 'Klant',
                    'is_vertegenwoordiger' => true,
                ],
                'contact' => [
                    'id' => 1,
                    'straat' => 'Prinses Irenestraat',
                    'huisnummer' => '12',
                    'toevoeging' => 'A',
                    'postcode' => '5271TH',
                    'woonplaats' => 'Maaskantje',
                    'email' => 'j.van.zevenhuizen@gmail.com',
                    'mobiel' => '+31 623456123',
                ],
            ],
            2 => [
                'id' => 2,
                'naam' => 'BergkampGezin',
                'vertegenwoordiger' => [
                    'voornaam' => 'Arjan',
                    'tussenvoegsel' => '',
                    'achternaam' => 'Bergkamp',
                    'geboortedatum' => '1968-07-12',
                    'type_persoon' => 'Klant',
                    'is_vertegenwoordiger' => true,
                ],
                'contact' => [
                    'id' => 2,
                    'straat' => 'Gibraltarstraat',
                    'huisnummer' => '234',
                    'toevoeging' => '',
                    'postcode' => '5271TJ',
                    'woonplaats' => 'Maaskantje',
                    'email' => 'a.bergkamp@hotmail.com',
                    'mobiel' => '+31 623456123',
                ],
            ],
            3 => [
                'id' => 3,
                'naam' => 'HeuvelGezin',
                'vertegenwoordiger' => [
                    'voornaam' => 'Selma',
                    'tussenvoegsel' => 'van de',
                    'achternaam' => 'Heuvel',
                    'geboortedatum' => '1965-09-04',
                    'type_persoon' => 'Klant',
                    'is_vertegenwoordiger' => true,
                ],
                'contact' => [
                    'id' => 3,
                    'straat' => 'Der Kinderenstraat',
                    'huisnummer' => '456',
                    'toevoeging' => 'Bis',
                    'postcode' => '5271TH',
                    'woonplaats' => 'Maaskantje',
                    'email' => 's.van.de.heuvel@gmail.com',
                    'mobiel' => '+31 623456123',
                ],
            ],
            4 => [
                'id' => 4,
                'naam' => 'ScherderGezin',
                'vertegenwoordiger' => [
                    'voornaam' => 'Eva',
                    'tussenvoegsel' => '',
                    'achternaam' => 'Scherder',
                    'geboortedatum' => '2000-04-07',
                    'type_persoon' => 'Klant',
                    'is_vertegenwoordiger' => true,
                ],
                'contact' => [
                    'id' => 4,
                    'straat' => 'Nachtegaalstraat',
                    'huisnummer' => '233',
                    'toevoeging' => 'A',
                    'postcode' => '5271TJ',
                    'woonplaats' => 'Maaskantje',
                    'email' => 'e.scherder@gmail.com',
                    'mobiel' => '+31 623456123',
                ],
            ],
            5 => [
                'id' => 5,
                'naam' => 'DeJongGezin',
                'vertegenwoordiger' => [
                    'voornaam' => 'Frieda',
                    'tussenvoegsel' => '',
                    'achternaam' => 'de Jong',
                    'geboortedatum' => '1980-09-04',
                    'type_persoon' => 'Klant',
                    'is_vertegenwoordiger' => true,
                ],
                'contact' => [
                    'id' => 5,
                    'straat' => 'Bertram Russellstraat',
                    'huisnummer' => '45',
                    'toevoeging' => '',
                    'postcode' => '5271TH',
                    'woonplaats' => 'Maaskantje',
                    'email' => 'f.de.jong@hotmail.com',
                    'mobiel' => '+31 623456123',
                ],
            ],
            6 => [
                'id' => 6,
                'naam' => 'VanderBergGezin',
                'vertegenwoordiger' => [
                    'voornaam' => 'Hanna',
                    'tussenvoegsel' => '',
                    'achternaam' => 'van der Berg',
                    'geboortedatum' => '1999-09-09',
                    'type_persoon' => 'Klant',
                    'is_vertegenwoordiger' => true,
                ],
                'contact' => [
                    'id' => 6,
                    'straat' => 'Leonardo Da VinciHof',
                    'huisnummer' => '34',
                    'toevoeging' => '',
                    'postcode' => '5271ZE',
                    'woonplaats' => 'Maaskantje',
                    'email' => 'h.van.der.berg@gmail.com',
                    'mobiel' => '+31 623456123',
                ],
            ],
        ];
    }

    public function index(Request $request)
    {
        // Gebruik alleen testdata, geen database
        $gezinnen = collect($this->getTestData());
        $postcodes = $gezinnen->pluck('contact.postcode')->unique()->sort()->values();

        // Filter gezinnen op postcode indien geselecteld
        if ($request->filled('postcode')) {
            $gezinnen = $gezinnen->filter(function ($gezin) use ($request) {
                return $gezin['contact']['postcode'] === $request->postcode;
            });
        }

        return view('klanten.index', [
            'gezinnen' => $gezinnen,
            'postcodes' => $postcodes,
        ]);
    }

    public function show($id)
    {
        $klant = session('klant_'.$id);

        if (!$klant) {
            $testData = $this->getTestData();
            $klant = $testData[$id] ?? reset($testData);
        }

        return view('klanten.show', compact('klant'));
    }

    public function edit($id)
    {
        $klant = session('klant_'.$id);

        if (!$klant) {
            $testData = $this->getTestData();
            $klant = $testData[$id] ?? reset($testData);
        }

        // Flatten contactgegevens naar root voor het formulier
        if (isset($klant['contact']) && is_array($klant['contact'])) {
            foreach ($klant['contact'] as $key => $value) {
                $klant[$key] = $value;
            }
        }
        // Flatten vertegenwoordiger naar root voor het formulier
        if (isset($klant['vertegenwoordiger']) && is_array($klant['vertegenwoordiger'])) {
            foreach ($klant['vertegenwoordiger'] as $key => $value) {
                $klant[$key] = $value;
            }
        }

        foreach ($klant as $key => $value) {
            if (old($key) !== null) {
                $klant[$key] = old($key);
            }
        }

        return view('klanten.edit', compact('klant'));
    }

    public function update(Request $request, $id)
    {
        // Eerst validatie zonder custom rule zodat errors netjes getoond worden
        $data = $request->validate([
            'voornaam' => 'required|string|max:255',
            'tussenvoegsel' => 'nullable|string|max:50',
            'achternaam' => 'required|string|max:255',
            'geboortedatum' => 'nullable|date',
            'type_persoon' => 'nullable|string|max:50',
            'vertegenwoordiger' => 'nullable|string|max:50',
            'straatnaam' => 'nullable|string|max:255',
            'huisnummer' => 'nullable|numeric',
            'toevoeging' => 'nullable|string|max:10',
            'postcode' => 'required|string|max:10',
            'woonplaats' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'mobiel' => 'nullable|string|max:20',
        ]);

        // Unhappy scenario: postcode moet met 5271 beginnen
        if (substr($data['postcode'], 0, 4) !== '5271') {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['postcode' => 'De postcode komt niet uit de regio Maaskantje'])
                ->with('status', 'De contactgegevens van de geselecteerde klant kunnen niet gewijzigd');
        }

        // Happy scenario: wijziging toegestaan
        $data['id'] = $id;
        session(['klant_'.$id => $data]);

        return redirect()
            ->route('klanten.show', $id)
            ->with('status', 'De klantgegevens zijn gewijzigd');
    }
}
