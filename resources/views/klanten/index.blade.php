<x-app-layout>
    <div class="max-w-5xl mx-auto mt-10 bg-white rounded-lg shadow border border-gray-200 p-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
            <h1 class="text-2xl font-semibold text-green-800 mb-4 md:mb-0">Overzicht Klanten</h1>
            <form method="GET" action="{{ url()->current() }}" class="flex gap-2 w-full md:w-auto justify-end">
                <select name="postcode" class="border border-gray-300 rounded px-6 py-2 text-base bg-white focus:outline-none focus:ring-2 focus:ring-green-200 focus:border-green-400 min-w-[200px] appearance-none">
                    <option value="">Selecteer Postcode</option>
                    <option value="1234AB" @if(request('postcode') == '1234AB') selected @endif>1234AB</option>
                    <option value="5678CD" @if(request('postcode') == '5678CD') selected @endif>5678CD</option>
                    <option value="1111AA" @if(request('postcode') == '1111AA') selected @endif>1111AA</option>
                    <option value="2222BB" @if(request('postcode') == '2222BB') selected @endif>2222BB</option>
                    <option value="3333CC" @if(request('postcode') == '3333CC') selected @endif>3333CC</option>
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
                                'postcode' => '1234AB',
                                'naam' => 'Familie Jansen',
                                'vertegenwoordiger' => 'Jan Jansen',
                                'email' => 'jan.jansen@email.com',
                                'mobiel' => '06-12345678',
                                'adres' => 'Dorpsstraat 1',
                                'woonplaats' => 'Maaskantje',
                            ],
                            [
                                'postcode' => '5678CD',
                                'naam' => 'Familie De Vries',
                                'vertegenwoordiger' => 'Piet de Vries',
                                'email' => 'piet.vries@email.com',
                                'mobiel' => '06-87654321',
                                'adres' => 'Kerklaan 22',
                                'woonplaats' => 'Maaskantje',
                            ],
                            [
                                'postcode' => '1111AA',
                                'naam' => 'Familie Bakker',
                                'vertegenwoordiger' => 'Anja Bakker',
                                'email' => 'anja.bakker@email.com',
                                'mobiel' => '06-23456789',
                                'adres' => 'Molenstraat 5',
                                'woonplaats' => 'Maaskantje',
                            ],
                            [
                                'postcode' => '2222BB',
                                'naam' => 'Familie Visser',
                                'vertegenwoordiger' => 'Kees Visser',
                                'email' => 'kees.visser@email.com',
                                'mobiel' => '06-34567890',
                                'adres' => 'Havenweg 10',
                                'woonplaats' => 'Maaskantje',
                            ],
                            [
                                'postcode' => '3333CC',
                                'naam' => 'Familie Smit',
                                'vertegenwoordiger' => 'Linda Smit',
                                'email' => 'linda.smit@email.com',
                                'mobiel' => '06-45678901',
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
