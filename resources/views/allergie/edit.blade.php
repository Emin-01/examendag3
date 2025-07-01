<x-app-layout>
    <div class="mx-auto py-8" style="max-width: 98vw;">
        <h1 class="text-[22px] font-normal text-green-700 underline mb-4">
            Allergie wijzigen
        </h1>
        <form method="POST" action="{{ route('allergie.update', ['id' => $persoon->id]) }}">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <p class="text-red-500 text-sm">
                    Voor het wijzigen van deze allergie wordt geadviseerd eerst een arts te raadplegen
                    vanwege een hoog risico op een anafylactisch shock.
                </p>
            </div>
            <div class="mb-4">
                <label for="allergie" class="block text-gray-700">Selecteer nieuwe allergie:</label>
                <select name="allergie_id" id="allergie" class="border rounded px-2 py-1 w-full">
                    @foreach($allergies as $allergie)
                        <option value="{{ $allergie->id }}" {{ $persoon->allergie_id == $allergie->id ? 'selected' : '' }}>
                            {{ $allergie->naam }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                Wijzig Allergie
            </button>
        </form>
    </div>
</x-app-layout>
