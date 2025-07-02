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

        // Flatten contactgegevens naar root voor de view
        if (isset($klant['contact']) && is_array($klant['contact'])) {
            foreach ($klant['contact'] as $key => $value) {
                $klant[$key] = $value;
            }
        }
        // Flatten vertegenwoordiger naar root voor de view
        if (isset($klant['vertegenwoordiger']) && is_array($klant['vertegenwoordiger'])) {
            foreach ($klant['vertegenwoordiger'] as $key => $value) {
                $klant[$key] = $value;
            }
        }

        // Zorg dat alleen scalars worden getoond in de view
        foreach ($klant as $key => $value) {
            if (is_array($value)) {
                $klant[$key] = '';
            }
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
            'postcode' => [
                'required',
                function ($attribute, $value, $fail) {
                    $input = strtoupper(str_replace(' ', '', $value));
                    if (!preg_match('/^[0-9]{4}[A-Z]{2}$/', $input)) {
                        $fail('De postcode moet 4 cijfers en 2 letters bevatten (bijv. 5271AB)');
                        return;
                    }
                    // Alleen deze postcode is toegestaan (zonder spaties, hoofdletters)
                    $toegestanePostcode = '5271ZH';
                    if ($input !== $toegestanePostcode) {
                        $fail('De postcode komt niet uit de regio Maaskantje');
                    }
                }
            ],
            'woonplaats' => 'nullable',
            'email' => 'required|email',
            'mobiel' => 'nullable',
        ]);

        // Simuleer update: sla ALLE gewijzigde data tijdelijk op in de sessie
        session(['klant_'.$id => $data + ['id' => $id]]);

        return redirect()
            ->route('klanten.show', $id)
            ->with('status', 'De klantgegevens zijn gewijzigd');
    }

}