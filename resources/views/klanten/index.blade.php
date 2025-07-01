{{-- resources/views/klanten/index.blade.php --}}
<x-app-layout>
    <div class="max-w-5xl mx-auto mt-10 bg-white rounded-lg shadow border border-gray-200 p-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
            <h1 class="text-2xl font-semibold text-green-800 mb-4 md:mb-0">Overzicht Klanten</h1>
            <form method="GET" action="{{ route('klanten.index') }}" class="flex gap-2 w-full md:w-auto justify-end">
                <select name="postcode" class="border border-gray-300 rounded px-6 py-2 text-base bg-white focus:outline-none focus:ring-2 focus:ring-green-200 focus:border-green-400 min-w-[200px] appearance-none">
                    <option value="">Selecteer Postcode</option>
                    @foreach($postcodes ?? [] as $postcode)
                        <option value="{{ $postcode }}" @if(request('postcode') == $postcode) selected @endif>{{ $postcode }}</option>
                    @endforeach
                </select>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded font-semibold text-base shadow transition">Toon Klanten</button>
            </form>
        </div>
        <div class="overflow-x-auto rounded-lg border border-gray-100">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-4 py-2 font-semibold text-gray-700">Gezinsnaam</th>
                        <th class="px-4 py-2 font-semibold text-gray-700">Vertegenwoordiger</th>
                        <th class="px-4 py-2 font-semibold text-gray-700">E-mailadres</th>
                        <th class="px-4 py-2 font-semibold text-gray-700">Mobiel</th>
                        <th class="px-4 py-2 font-semibold text-gray-700">Adres</th>
                        <th class="px-4 py-2 font-semibold text-gray-700">Woonplaats</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($gezinnen as $gezin)
                        <tr class="even:bg-gray-50 hover:bg-green-50 transition">
                            <td class="px-4 py-3 border-b border-gray-100">{{ $gezin->naam }}</td>
                            <td class="px-4 py-3 border-b border-gray-100">
                                {{ optional($gezin->vertegenwoordiger)->voornaam }}
                                {{ optional($gezin->vertegenwoordiger)->achternaam }}
                            </td>
                            <td class="px-4 py-3 border-b border-gray-100">
                                {{ optional($gezin->contact)->email }}
                            </td>
                            <td class="px-4 py-3 border-b border-gray-100">
                                {{ optional($gezin->contact)->mobiel }}
                            </td>
                            <td class="px-4 py-3 border-b border-gray-100">
                                {{ optional($gezin->contact)->straat }}
                                {{ optional($gezin->contact)->huisnummer }}
                            </td>
                            <td class="px-4 py-3 border-b border-gray-100">
                                {{ optional($gezin->contact)->woonplaats }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-3 text-center text-gray-500">Geen klanten gevonden.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="flex justify-end mt-6">
            <a href="{{ route('dashboard') }}">
                <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded font-semibold text-base shadow transition">
                    Home
                </button>
            </a>
        </div>
    </div>
</x-app-layout>
