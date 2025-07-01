{{-- resources/views/klanten/edit.blade.php --}}
<x-app-layout>
    <div class="max-w-2xl mx-auto mt-10 bg-white rounded-lg shadow border border-gray-200 p-6">
        <h1 class="text-2xl font-semibold text-green-800 mb-6">Wijzig Klant Details</h1>
        <form method="POST" action="{{ route('klanten.update', $klant['id'] ?? 1) }}">
            @csrf
            <table class="w-full mb-8 border border-gray-200 rounded">
                <tbody>
                    <tr><td class="py-2 px-4 font-semibold w-1/3">Voornaam</td><td class="py-2 px-4"><input type="text" name="voornaam" class="w-full border rounded px-2 py-1" value="{{ $klant['voornaam'] }}"></td></tr>
                    <tr><td class="py-2 px-4 font-semibold">Tussenvoegsel</td><td class="py-2 px-4"><input type="text" name="tussenvoegsel" class="w-full border rounded px-2 py-1" value="{{ $klant['tussenvoegsel'] }}"></td></tr>
                    <tr><td class="py-2 px-4 font-semibold">Achternaam</td><td class="py-2 px-4"><input type="text" name="achternaam" class="w-full border rounded px-2 py-1" value="{{ $klant['achternaam'] }}"></td></tr>
                    <tr><td class="py-2 px-4 font-semibold">Geboortedatum</td><td class="py-2 px-4"><input type="date" name="geboortedatum" class="w-full border rounded px-2 py-1" value="{{ $klant['geboortedatum'] }}"></td></tr>
                    <tr><td class="py-2 px-4 font-semibold">TypePersoon</td><td class="py-2 px-4"><input type="text" name="type_persoon" class="w-full border rounded px-2 py-1" value="{{ $klant['type_persoon'] }}"></td></tr>
                    <tr><td class="py-2 px-4 font-semibold">Vertegenwoordiger</td><td class="py-2 px-4"><input type="text" name="vertegenwoordiger" class="w-full border rounded px-2 py-1" value="{{ $klant['vertegenwoordiger'] }}"></td></tr>
                    <tr><td class="py-2 px-4 font-semibold">Straatnaam</td><td class="py-2 px-4"><input type="text" name="straatnaam" class="w-full border rounded px-2 py-1" value="{{ $klant['straatnaam'] }}"></td></tr>
                    <tr><td class="py-2 px-4 font-semibold">Huisnummer</td><td class="py-2 px-4"><input type="text" name="huisnummer" class="w-full border rounded px-2 py-1" value="{{ $klant['huisnummer'] }}"></td></tr>
                    <tr><td class="py-2 px-4 font-semibold">Toevoeging</td><td class="py-2 px-4"><input type="text" name="toevoeging" class="w-full border rounded px-2 py-1" value="{{ $klant['toevoeging'] }}"></td></tr>
                    <tr><td class="py-2 px-4 font-semibold">Postcode</td><td class="py-2 px-4"><input type="text" name="postcode" class="w-full border rounded px-2 py-1" value="{{ $klant['postcode'] }}"></td></tr>
                    <tr><td class="py-2 px-4 font-semibold">Woonplaats</td><td class="py-2 px-4"><input type="text" name="woonplaats" class="w-full border rounded px-2 py-1" value="{{ $klant['woonplaats'] }}"></td></tr>
                    <tr><td class="py-2 px-4 font-semibold">Email</td><td class="py-2 px-4"><input type="email" name="email" class="w-full border rounded px-2 py-1" value="{{ $klant['email'] }}"></td></tr>
                    <tr><td class="py-2 px-4 font-semibold">Mobiel</td><td class="py-2 px-4"><input type="text" name="mobiel" class="w-full border rounded px-2 py-1" value="{{ $klant['mobiel'] }}"></td></tr>
                </tbody>
            </table>
            <div class="flex flex-wrap gap-2 justify-end">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded font-semibold text-base shadow transition">Wijzig Klant Details</button>
                <a href="{{ route('klanten.show', $klant['id']) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded font-semibold text-base shadow transition">Terug</a>
                <a href="{{ route('dashboard') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded font-semibold text-base shadow transition">Home</a>
            </div>
        </form>
    </div>
</x-app-layout>
