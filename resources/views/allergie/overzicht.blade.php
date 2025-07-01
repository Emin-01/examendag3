<x-app-layout>
    <div class="mx-auto py-8" style="max-width: 98vw;">
        <div class="flex justify-between items-center mb-2">
            <h1 class="text-[22px] font-normal text-green-700 underline" style="margin-left:2px;">
                Overzicht gezinnen met allergieën
            </h1>
            <div class="flex items-center gap-2">
                <form method="GET" action="{{ route('allergie.overzicht') }}">
                    <select name="allergie_id" class="border rounded px-2 py-1 h-8 text-[15px]">
                        <option value="">Selecteer eetwens</option>
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
                        <th class="border px-2 py-1 text-left font-semibold text-[15px]">Acties</th>
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
                                <a href="{{ route('allergie.edit', ['id' => $gezin->id]) }}" class="bg-blue-500 text-white px-4 py-1 rounded text-[15px] font-normal">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13l6.586-6.586a2 2 0 112.828 2.828L11.828 15.828a2 2 0 01-1.414.586H7v-3a2 2 0 01.586-1.414z" />
                                    </svg>
                                </a>
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
