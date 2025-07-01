{{-- resources/views/klanten/edit.blade.php --}}
<x-app-layout>
    <div class="max-w-2xl mx-auto mt-10 bg-white rounded-lg shadow border border-gray-200 p-6">
        <h1 class="text-2xl font-semibold text-green-800 mb-6">Wijzig Klant Details</h1>
        @if(session('status'))
            <div class="mb-4 px-4 py-3 rounded {{ $errors->any() ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }} font-semibold text-center">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('klanten.update', $klant['id'] ?? 1) }}">
            @csrf
            <table class="w-full mb-8 border border-gray-200 rounded">
                <tbody>
                    <tr>
                        <td class="py-2 px-4 font-semibold w-1/3">Voornaam</td>
                        <td class="py-2 px-4">
                            <input type="text" name="voornaam" class="w-full border rounded px-2 py-1" value="{{ old('voornaam', $klant['voornaam']) }}">
                            @error('voornaam') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 font-semibold">Tussenvoegsel</td>
                        <td class="py-2 px-4">
                            <input type="text" name="tussenvoegsel" class="w-full border rounded px-2 py-1" value="{{ old('tussenvoegsel', $klant['tussenvoegsel']) }}">
                            @error('tussenvoegsel') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 font-semibold">Achternaam</td>
                        <td class="py-2 px-4">
                            <input type="text" name="achternaam" class="w-full border rounded px-2 py-1" value="{{ old('achternaam', $klant['achternaam']) }}">
                            @error('achternaam') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 font-semibold">Geboortedatum</td>
                        <td class="py-2 px-4">
                            <input type="date" name="geboortedatum" class="w-full border rounded px-2 py-1" value="{{ old('geboortedatum', $klant['geboortedatum']) }}">
                            @error('geboortedatum') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 font-semibold">TypePersoon</td>
                        <td class="py-2 px-4">
                            <input type="text" name="type_persoon" class="w-full border rounded px-2 py-1" value="{{ old('type_persoon', $klant['type_persoon']) }}">
                            @error('type_persoon') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 font-semibold">Vertegenwoordiger</td>
                        <td class="py-2 px-4">
                            <input type="text" name="vertegenwoordiger" class="w-full border rounded px-2 py-1" value="{{ old('vertegenwoordiger', $klant['vertegenwoordiger']) }}">
                            @error('vertegenwoordiger') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 font-semibold">Straatnaam</td>
                        <td class="py-2 px-4">
                            <input type="text" name="straatnaam" class="w-full border rounded px-2 py-1" value="{{ old('straatnaam', $klant['straatnaam']) }}">
                            @error('straatnaam') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 font-semibold">Huisnummer</td>
                        <td class="py-2 px-4">
                            <input type="text" name="huisnummer" class="w-full border rounded px-2 py-1" value="{{ old('huisnummer', $klant['huisnummer']) }}">
                            @error('huisnummer') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 font-semibold">Toevoeging</td>
                        <td class="py-2 px-4">
                            <input type="text" name="toevoeging" class="w-full border rounded px-2 py-1" value="{{ old('toevoeging', $klant['toevoeging']) }}">
                            @error('toevoeging') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 font-semibold">Postcode</td>
                        <td class="py-2 px-4">
                            <input type="text" name="postcode" class="w-full border rounded px-2 py-1" value="{{ old('postcode', $klant['postcode']) }}">
                            @error('postcode') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 font-semibold">Woonplaats</td>
                        <td class="py-2 px-4">
                            <input type="text" name="woonplaats" class="w-full border rounded px-2 py-1" value="{{ old('woonplaats', $klant['woonplaats']) }}">
                            @error('woonplaats') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 font-semibold">Email</td>
                        <td class="py-2 px-4">
                            <input type="email" name="email" class="w-full border rounded px-2 py-1" value="{{ old('email', $klant['email']) }}">
                            @error('email') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 font-semibold">Mobiel</td>
                        <td class="py-2 px-4">
                            <input type="text" name="mobiel" class="w-full border rounded px-2 py-1" value="{{ old('mobiel', $klant['mobiel']) }}">
                            @error('mobiel') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                        </td>
                    </tr>
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
