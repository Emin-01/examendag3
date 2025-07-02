<x-app-layout>
    <div class="max-w-5xl mx-auto mt-10 bg-white rounded-lg shadow border border-gray-200 p-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
            <h1 class="text-2xl font-semibold text-green-800 mb-4 md:mb-0">Overzicht Klanten</h1>
            <form method="GET" action="{{ url()->current() }}" class="flex gap-2 w-full md:w-auto justify-end">
                <select name="postcode" class="border border-gray-300 rounded px-6 py-2 text-base bg-white focus:outline-none focus:ring-2 focus:ring-green-200 focus:border-green-400 min-w-[200px] appearance-none">
                    <option value="">Selecteer Postcode</option>
                    <option value="5271TH" @if(request('postcode') == '5271TH') selected @endif>5271TH</option>
                    <option value="5271TJ" @if(request('postcode') == '5271TJ') selected @endif>5271TJ</option>
                    <option value="5271ZE" @if(request('postcode') == '5271ZE') selected @endif>5271ZE</option>
                    <option value="5271ZH" @if(request('postcode') == '5271ZH') selected @endif>5271ZH</option>
                </select>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded font-semibold text-base shadow transition">Toon Klanten</button>
            </form>
        </div>
        <div class="overflow-x-auto rounded-lg border border-gray-100">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-4 py-2 font-semibold text-gray-700">Naam Gezin</th>
                        <th class="px-4 py-2 font-semibold text-gray-700">Vertegenwoordiger</th>
                        <th class="px-4 py-2 font-semibold text-gray-700">E-mailadres</th>
                        <th class="px-4 py-2 font-semibold text-gray-700">Mobiel</th>
                        <th class="px-4 py-2 font-semibold text-gray-700">Adres</th>
                        <th class="px-4 py-2 font-semibold text-gray-700">Woonplaats</th>
                        <th class="px-4 py-2 font-semibold text-gray-700 text-center">Klant Details</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Testdata met postcode filter --}}
                    @php
                        $testData = [
                            [
                                'postcode' => '5271TH',
                                'naam' => 'ZevenhuizenGezin',
                                'vertegenwoordiger' => 'Johan Zevenhuizen ',
                                'email' => 'j.van.zevenhuizen@gmail.com',
                                'mobiel' => '+31 623456123',
                                'adres' => 'Prinses Irenestraat 12',
                                'woonplaats' => 'Maaskantje',
                            ],
                            [
                                'postcode' => '5271TJ ',
                                'naam' => 'BergkampGezin',
                                'vertegenwoordiger' => 'Piet de Vries',
                                'email' => 'piet.vries@email.com',
                                'mobiel' => '+31 623456123',
                                'adres' => 'Kerklaan 22',
                                'woonplaats' => 'Maaskantje',
                            ],
                            [
                                'postcode' => '5271TH',
                                'naam' => 'HeuvelGezin',
                                'vertegenwoordiger' => 'Anja Bakker',
                                'email' => 'anja.bakker@email.com',
                                'mobiel' => '+31 623456123',
                                'adres' => 'Molenstraat 5',
                                'woonplaats' => 'Maaskantje',
                            ],
                            [
                                'postcode' => '5271TJ',
                                'naam' => 'ScherderGezin',
                                'vertegenwoordiger' => 'Kees Visser',
                                'email' => 'kees.visser@email.com',
                                'mobiel' => '+31 623456123',
                                'adres' => 'Havenweg 10',
                                'woonplaats' => 'Maaskantje',
                            ],
                            [
                                'postcode' => '5271ZE',
                                'naam' => 'DeJongGezin',
                                'vertegenwoordiger' => 'Linda Smit',
                                'email' => 'linda.smit@email.com',
                                'mobiel' => '+31 623456123',
                                'adres' => 'Schoolstraat 8',
                                'woonplaats' => 'Maaskantje',
                            ],
                        ];
                        $selectedPostcode = request('postcode');
                        $filtered = $selectedPostcode
                            ? array_filter($testData, fn($row) => $row['postcode'] === $selectedPostcode)
                            : $testData;
                    @endphp
                    @forelse($filtered as $row)
                    <tr class="even:bg-gray-50 hover:bg-green-50 transition">
                        <td class="px-4 py-3 border-b border-gray-100">{{ $row['naam'] }}</td>
                        <td class="px-4 py-3 border-b border-gray-100">{{ $row['vertegenwoordiger'] }}</td>
                        <td class="px-4 py-3 border-b border-gray-100">{{ $row['email'] }}</td>
                        <td class="px-4 py-3 border-b border-gray-100">{{ $row['mobiel'] }}</td>
                        <td class="px-4 py-3 border-b border-gray-100">{{ $row['adres'] }}</td>
                        <td class="px-4 py-3 border-b border-gray-100">{{ $row['woonplaats'] }}</td>
                        <td class="px-4 py-3 border-b border-gray-100 text-center">
                            <a href="{{ route('klanten.show', 1) }}" class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-white border border-blue-300 hover:bg-blue-50 transition" title="Details">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <rect x="9" y="9" width="6" height="6" stroke="currentColor" stroke-width="2" fill="none"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-4 py-3 text-center font-semibold" style="background:rgba(255,165,0,0.15); color:#222;">
                            Er zijn geen klanten bekent die de geselecteerde postcode hebben
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="flex justify-end mt-6">
            <a href="{{ route('dashboard') }}">
                <button class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded font-semibold text-sm shadow transition">
                    Home
                </button>
            </a>
        </div>
    </div>
</x-app-layout>
