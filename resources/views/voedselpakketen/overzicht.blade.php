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
                    </tr>
                </thead>
                <tbody>
                    @for($i = 0; $i < 6; $i++)
                    <tr>
                        <td class="border px-2 py-1 text-[15px]"></td>
                        <td class="border px-2 py-1 text-[15px]"></td>
                        <td class="border px-2 py-1 text-[15px]"></td>
                        <td class="border px-2 py-1 text-[15px]"></td>
                        <td class="border px-2 py-1 text-[15px]"></td>
                        <td class="border px-2 py-1 text-[15px]"></td>
                        <td class="border px-2 py-1 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <rect x="4" y="7" width="16" height="13" rx="2" stroke-width="2" stroke="currentColor" fill="none"/>
                                <path d="M8 7V5a4 4 0 1 1 8 0v2" stroke-width="2" stroke="currentColor" fill="none"/>
                            </svg>
                        </td>
                    </tr>
                    @endfor
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
