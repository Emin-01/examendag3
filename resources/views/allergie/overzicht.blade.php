<x-app-layout>
    <div class="mx-auto py-8" style="max-width: 98vw;">
        <div class="flex justify-between items-center mb-2">
            <h1 class="text-[22px] font-normal text-green-700 underline" style="margin-left:2px;">
                Overzicht gezinnen met allergieën
            </h1>
            <div class="flex items-center gap-2">
                <form method="GET" action="{{ route('allergie.overzicht') }}">
                    <select name="allergie_id" class="border rounded px-2 py-1 h-8 text-[15px]">
                        <option value="">Selecteer allergie</option>
                        @foreach($allergies as $allergie)
                            <option value="{{ $allergie->id }}" {{ request('allergie_id') == $allergie->id ? 'selected' : '' }}>
                                {{ $allergie->naam }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" class="bg-gray-400 text-white px-3 py-1 rounded text-[15px] font-normal hover:bg-gray-500 h-8">
                        Toon Gezinnen
                    </button>
                </form>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full border border-gray-300" style="table-layout:fixed;">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-2 py-1 text-left font-semibold text-[15px]">Gezinsnaam</th>
                        <th class="border px-2 py-1 text-left font-semibold text-[15px]">Omschrijving</th>
                        <th class="border px-2 py-1 text-left font-semibold text-[15px]">Volwassenen</th>
                        <th class="border px-2 py-1 text-left font-semibold text-[15px]">Kinderen</th>
                        <th class="border px-2 py-1 text-left font-semibold text-[15px]">Babys</th>
                        <th class="border px-2 py-1 text-left font-semibold text-[15px]">Vertegenwoordiger</th>
                        <th class="border px-2 py-1 text-left font-semibold text-[15px]">Allergie Details</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($gezinnen as $gezin)
                        <tr>
                            <td class="border px-2 py-1 text-[15px]">{{ $gezin->naam }}</td>
                            <td class="border px-2 py-1 text-[15px]">{{ $gezin->omschrijving }}</td>
                            <td class="border px-2 py-1 text-[15px]">{{ $gezin->aantal_volwassenen }}</td>
                            <td class="border px-2 py-1 text-[15px]">{{ $gezin->aantal_kinderen }}</td>
                            <td class="border px-2 py-1 text-[15px]">{{ $gezin->aantal_babys }}</td>
                            <td class="border px-2 py-1 text-[15px]">
                                @php
                                    $vertegenwoordiger = $gezin->personen->where('is_vertegenwoordiger', true)->first();
                                @endphp
                                {{ $vertegenwoordiger ? $vertegenwoordiger->voornaam . ' ' . $vertegenwoordiger->achternaam : '' }}
                            </td>
                            <td class="border px-2 py-1 text-center">
                                @foreach($gezin->personen as $persoon)
                                    @foreach($persoon->allergies as $allergie)
                                        <span class="inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full mr-1 mt-1">
                                            {{ $allergie->naam }}
                                        </span>
                                    @endforeach
                                @endforeach
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="border px-2 py-1 text-center text-gray-500">
                                Geen gezinnen gevonden.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div style="width:100%;height:40px;position:relative;">
            <a href="{{ route('dashboard') }}" style="position:absolute;right:0;bottom:0;">
                <button class="bg-blue-500 text-white px-4 py-1 rounded text-[15px] font-normal">home</button>
            </a>
        </div>
    </div>
</x-app-layout>
