<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">
                <h1 class="text-xl font-semibold text-green-700 underline mb-4">
                    Overzicht gezinnen met allergieën
                </h1>

                @if(isset($melding))
                    <div class="bg-yellow-50 border border-yellow-200 text-yellow-800 px-4 py-3 rounded mb-4">
                        {{ $melding }}
                    </div>
                @endif

                @if($gezinnenMetAllergies->isNotEmpty())
                    <table class="min-w-full border border-gray-300">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="border border-gray-300 px-4 py-2">Naam</th>
                                <th class="border border-gray-300 px-4 py-2">Omschrijving</th>
                                <th class="border border-gray-300 px-4 py-2">Volwassenen</th>
                                <th class="border border-gray-300 px-4 py-2">Kinderen</th>
                                <th class="border border-gray-300 px-4 py-2">Babys</th>
                                <th class="border border-gray-300 px-4 py-2">Vertegenwoordiger</th>
                                <th class="border border-gray-300 px-4 py-2">Allergie Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($gezinnenMetAllergies as $gezin)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">{{ $gezin->naam }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $gezin->omschrijving }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $gezin->aantal_volwassenen }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $gezin->aantal_kinderen }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $gezin->aantal_babys }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        @php
                                            $vertegenwoordiger = $gezin->personen->where('is_vertegenwoordiger', true)->first();
                                        @endphp
                                        {{ $vertegenwoordiger ? $vertegenwoordiger->volledige_naam : '' }}
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2 text-center">
                                        <button type="button" onclick="toggleDetails({{ $gezin->id }}, this)" class="inline-block">[+]</button>
                                    </td>
                                </tr>
                                <tr id="details-{{ $gezin->id }}" class="hidden bg-gray-50">
                                    <td colspan="7" class="border border-gray-300 px-4 py-2">
                                        <div>
                                            <span class="font-semibold">Allergieën per persoon:</span>
                                            @foreach($gezin->personen->filter(fn($persoon) => $persoon->allergies->count() > 0) as $persoon)
                                                <div class="ml-4">
                                                    <span class="font-semibold">{{ $persoon->volledige_naam }}:</span>
                                                    @foreach($persoon->allergies as $allergie)
                                                        <span class="inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full mr-1 mt-1">
                                                            {{ $allergie->naam }} ({{ ucfirst($allergie->anafylactisch_risico) }})
                                                        </span>
                                                    @endforeach
                                                </div>
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-gray-500">Er zijn momenteel geen gezinnen met geregistreerde allergieën.</p>
                @endif
            </div>

            <a href="{{ route('home') }}" class="absolute right-6 bottom-6 bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded shadow font-semibold">
                Home
            </a>
        </div>
    </div>

    <script>
        function toggleDetails(gezinId, button) {
            const detailsRow = document.getElementById('details-' + gezinId);
            if (detailsRow.classList.contains('hidden')) {
                detailsRow.classList.remove('hidden');
                button.textContent = '[-]';
            } else {
                detailsRow.classList.add('hidden');
                button.textContent = '[+]';
            }
        }
    </script>
</x-app-layout>
