<x-app-layout>
    <div class="max-w-5xl mx-auto mt-8 bg-white p-6 rounded shadow">
        <h2 class="text-green-700 underline text-xl font-semibold mb-4">Allergieën in het gezin</h2>
        <div class="mb-6">
            <table class="min-w-[350px] border border-gray-300 mb-4">
                <tr>
                    <td class="px-3 py-2 border border-gray-300 font-semibold">Gezinsnaam:</td>
                    <td class="px-3 py-2 border border-gray-300">{{ $gezinnen->naam ?? '~~~~' }}</td>
                </tr>
                <tr>
                    <td class="px-3 py-2 border border-gray-300 font-semibold">Omschrijving:</td>
                    <td class="px-3 py-2 border border-gray-300">{{ $gezinnen->omschrijving ?? '~~~~' }}</td>
                </tr>
                <tr>
                    <td class="px-3 py-2 border border-gray-300 font-semibold">Totaal aantal Personen:</td>
                    <td class="px-3 py-2 border border-gray-300">{{ $gezinnen->personen->count() ?? '~~~~' }}</td>
                </tr>
            </table>
        </div>
        <div>
            <table class="w-full border border-gray-300 mb-6">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-3 py-2 text-left">Naam</th>
                        <th class="border border-gray-300 px-3 py-2 text-left">Type Persoon</th>
                        <th class="border border-gray-300 px-3 py-2 text-left">Gezinsrol</th>
                        <th class="border border-gray-300 px-3 py-2 text-left">Allergie</th>
                        <th class="border border-gray-300 px-3 py-2 text-left">Wijzig Allergie</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($gezinnen->personen as $persoon)
                        <tr>
                            <td class="border border-gray-300 px-3 py-2">{{ $persoon->voornaam }} {{ $persoon->achternaam }}</td>
                            <td class="border border-gray-300 px-3 py-2">{{ $persoon->type_persoon ?? '~~~~' }}</td>
                            <td class="border border-gray-300 px-3 py-2">
                                {{ $persoon->is_vertegenwoordiger ? 'Vertegenwoordiger' : ($persoon->gezinsrol ?? '~~~~') }}
                            </td>
                            <td class="border border-gray-300 px-3 py-2">
                                {{ $persoon->allergie->naam ?? '~~~~' }}
                            </td>
                            <td class="border border-gray-300 px-3 py-2 text-center">
                                <a href="{{ route('allergie.details', ['id' => $persoon->id]) }}" title="Wijzig Allergie" class="inline-block text-blue-600 hover:text-blue-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13l6.586-6.586a2 2 0 112.828 2.828L11.828 15.828a4 4 0 01-1.414.828l-4.243 1.415 1.415-4.243a4 4 0 01.828-1.414z" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex justify-end gap-2 mt-4">
            <a href="{{ url()->previous() }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">terug</a>
            <a href="{{ route('dashboard') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">home</a>
        </div>
    </div>
</x-app-layout>
