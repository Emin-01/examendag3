@extends('layouts.app')

@section('title', 'Homepage - Voedselbank Maaskantje')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow-md p-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-6">Welkom bij Voedselbank Maaskantje</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-blue-800 mb-3">Gezinsbeheer</h3>
                <p class="text-blue-600 mb-4">Beheer gezinnen en hun gegevens</p>
                <a href="{{ route('allergies.index') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Overzicht gezinsallergieën
                </a>
            </div>
            
            <div class="bg-green-50 border border-green-200 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-green-800 mb-3">Voedselpakketten</h3>
                <p class="text-green-600 mb-4">Beheer en samenstellen van voedselpakketten</p>
                <button class="inline-block bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded opacity-50 cursor-not-allowed">
                    Binnenkort beschikbaar
                </button>
            </div>
            
            <div class="bg-orange-50 border border-orange-200 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-orange-800 mb-3">Leveranciers</h3>
                <p class="text-orange-600 mb-4">Beheer leveranciers en voorraden</p>
                <button class="inline-block bg-orange-600 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded opacity-50 cursor-not-allowed">
                    Binnenkort beschikbaar
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
