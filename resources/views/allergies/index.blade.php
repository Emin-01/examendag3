@extends('layouts.app')

@section('title', 'Overzicht Gezinsallergieën')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Overzicht Gezinsallergieën</h1>
    
    <!-- Filter Form -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <form action="{{ route('allergies.filter') }}" method="POST" class="flex items-end gap-4">
            @csrf
            <div class="flex-1">
                <label for="allergie_id" class="block text-sm font-medium text-gray-700 mb-2">
                    Selecteer allergie:
                </label>
                <select name="allergie_id" id="allergie_id" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="">-- Selecteer een allergie --</option>
                    @foreach($allergies as $allergie)
                        <option value="{{ $allergie->id }}" 
                            {{ request('allergie_id') == $allergie->id || (isset($geselecteerdeAllergie) && $geselecteerdeAllergie->id == $allergie->id) ? 'selected' : '' }}>
                            {{ $allergie->naam }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Toon Gezinnen
                </button>
            </div>
            <div>
                <a href="{{ route('allergies.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                    Reset
                </a>
            </div>
        </form>
    </div>

    <!-- Results Section -->
    @if(isset($melding))
        <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-6">
            <strong>Let op:</strong> {{ $melding }}
        </div>
    @endif

    @if(isset($geselecteerdeAllergie))
        <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded mb-6">
            <strong>Gefilterd op allergie:</strong> {{ $geselecteerdeAllergie->naam }}
        </div>
    @endif

    <!-- Gezinnen Overview -->
    @if($gezinnenMetAllergies->count() > 0)
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="px-6 py-4 bg-gray-50 border-b">
                <h2 class="text-xl font-semibold text-gray-800">
                    Gezinnen met allergieën 
                    @if(isset($geselecteerdeAllergie))
                        ({{ $gezinnenMetAllergies->count() }} gevonden)
                    @else
                        ({{ $gezinnenMetAllergies->count() }} totaal)
                    @endif
                </h2>
            </div>
            
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Gezin
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Code
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Contactgegevens
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Personen met allergieën
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Allergieën
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($gezinnenMetAllergies as $gezin)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $gezin->naam }}</div>
                                    <div class="text-sm text-gray-500">{{ $gezin->omschrijving }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $gezin->code }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    @if($gezin->contacten->first())
                                        <div>{{ $gezin->contacten->first()->volledig_adres }}</div>
                                        <div class="text-gray-500">{{ $gezin->contacten->first()->email }}</div>
                                        <div class="text-gray-500">{{ $gezin->contacten->first()->mobiel }}</div>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @foreach($gezin->personen->filter(fn($persoon) => $persoon->allergies->count() > 0) as $persoon)
                                        <div class="text-sm text-gray-900 mb-1">
                                            {{ $persoon->volledige_naam }}
                                        </div>
                                    @endforeach
                                </td>
                                <td class="px-6 py-4">
                                    @php
                                        $alleAllergies = $gezin->personen->flatMap->allergies->unique('id');
                                    @endphp
                                    @foreach($alleAllergies as $allergie)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium mb-1 mr-1
                                            @if($allergie->anafylactisch_risico == 'hoog') bg-red-100 text-red-800
                                            @elseif($allergie->anafylactisch_risico == 'redelijkhoog') bg-orange-100 text-orange-800
                                            @elseif($allergie->anafylactisch_risico == 'laag') bg-yellow-100 text-yellow-800
                                            @else bg-green-100 text-green-800
                                            @endif">
                                            {{ $allergie->naam }}
                                            ({{ ucfirst($allergie->anafylactisch_risico) }})
                                        </span>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @elseif(!isset($melding))
        <div class="bg-gray-100 border border-gray-300 text-gray-700 px-4 py-3 rounded">
            Er zijn momenteel geen gezinnen met geregistreerde allergieën.
        </div>
    @endif
</div>
@endsection
