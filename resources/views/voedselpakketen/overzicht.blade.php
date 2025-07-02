<x-app-layout>
    <div class="mx-auto py-8" style="max-width: 98vw;">
        <div class="flex justify-between items-center mb-2">
            <h1 class="text-[22px] font-normal text-green-700 underline" style="margin-left:2px;">
                Overzicht gezinnen met voedselpakketten
            </h1>
            <div class="flex items-center gap-2">
                <select class="border rounded px-2 py-1 h-8 text-[15px]">
                    <option>Selecteer Eetwens</option>
                    <option>Vegetarisch</option>
                    <option>Halal</option>
                    <option>Glutenvrij</option>
                </select>
                <button class="bg-gray-400 text-white px-3 py-1 rounded text-[15px] font-normal hover:bg-gray-500 h-8">Toon Gezinnen</button>
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
                        <th class="border px-2 py-1 text-left font-semibold text-[15px]">Voedselpakket Details</th>
                        <th class="border px-2 py-1 text-left font-semibold text-[15px]">Personen wijzigen</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($gezinnen as $gezin)
                        <tr>
                            <td class="border px-2 py-1 text-[15px]">{{ $gezin->naam }}</td>
                            <td class="border px-2 py-1 text-[15px]">{{ $gezin->omschrijving }}</td>
                            <td class="border px-2 py-1 text-[15px]">{{ $gezin->aantal_volwassenen }}</td>
                            <td class="border px-2 py-1 text-[15px]">{{ $gezin->aantal_kinderen }}</td>
                            <td class="border px-2 py-1 text-[15px]">{{ $gezin->aantal_babys }}</td>
                            <td class="border px-2 py-1 text-[15px]">{{ trim($gezin->vertegenwoordiger) }}</td>
                            <td class="border px-2 py-1 text-center">
                                <a href="{{ route('voedselpakketen.pakketten', ['gezin_id' => $gezin->id]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline h-6 w-6 text-blue-500 hover:text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <rect x="4" y="7" width="16" height="13" rx="2" stroke-width="2" stroke="currentColor" fill="none"/>
                                        <path d="M8 7V5a4 4 0 1 1 8 0v2" stroke-width="2" stroke="currentColor" fill="none"/>
                                    </svg>
                                </a>
                            </td>
                            <td class="border px-2 py-1 text-center">
                                <a href="{{ route('personen.edit', ['gezin_id' => $gezin->id]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline h-6 w-6 text-green-500 hover:text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path d="M15.232 5.232l3.536 3.536M9 13l6-6 3 3-6 6H9v-3z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                  
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
                                <path d="M8 7V5a4 4 0 1 1 8 0v2" stroke-width="2" stroke="currentColor" fill="none"/>
                            </svg>
                        </td>
                    </tr>
                     <tr>
                        <td class="border px-2 py-1 text-[15px]">ScherderGezin</td>
                        <td class="border px-2 py-1 text-[15px]">Testgezin met 2 kinderen</td>
                        <td class="border px-2 py-1 text-[15px]">1</td>
                        <td class="border px-2 py-1 text-[15px]">0</td>
                        <td class="border px-2 py-1 text-[15px]">2</td>
                        <td class="border px-2 py-1 text-[15px]">Jan Testpersoon</td>
                        <td class="border px-2 py-1 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <rect x="4" y="7" width="16" height="13" rx="2" stroke-width="2" stroke="currentColor" fill="none"/>
                                <path d="M8 7V5a4 4 0 1 1 8 0v2" stroke-width="2" stroke="currentColor" fill="none"/>
                            </svg>
                        </td>
                    </tr>
                    <tr>
                        <td class="border px-2 py-1 text-[15px]">DeJongGezin</td>
                        <td class="border px-2 py-1 text-[15px]">Alleenstaande moeder</td>
                        <td class="border px-2 py-1 text-[15px]">1</td>
                        <td class="border px-2 py-1 text-[15px]">1</td>
                        <td class="border px-2 py-1 text-[15px]">0</td>
                        <td class="border px-2 py-1 text-[15px]">Anna Demo</td>
                        <td class="border px-2 py-1 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <rect x="4" y="7" width="16" height="13" rx="2" stroke-width="2" stroke="currentColor" fill="none"/>
                                <path d="M8 7V5a4 4 0 1 1 8 0v2" stroke-width="2" stroke="currentColor" fill="none"/>
                            </svg>
                        </td>
                    </tr>
                    <tr>
                        <td class="border px-2 py-1 text-[15px]">VanderBergGezin</td>
                        <td class="border px-2 py-1 text-[15px]">Gezin met allergie</td>
                        <td class="border px-2 py-1 text-[15px]">1</td>
                        <td class="border px-2 py-1 text-[15px]">0</td>
                        <td class="border px-2 py-1 text-[15px]">0</td>
                        <td class="border px-2 py-1 text-[15px]">Piet Voorbeeld</td>
                        <td class="border px-2 py-1 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <rect x="4" y="7" width="16" height="13" rx="2" stroke-width="2" stroke="currentColor" fill="none"/>
                                <path d="M8 7V5a4 4 0 1 1 8 0v2" stroke-width="2" stroke="currentColor" fill="none"/>
                            </svg>
                        </td>
                    </tr>
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

