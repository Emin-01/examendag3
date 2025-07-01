<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-3xl font-bold mb-6">Welkom bij Voedselbank Maaskantje</h1>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-blue-800 mb-3">Gezinsbeheer</h3>
                            <p class="text-blue-600 mb-4">Beheer gezinnen en hun gegevens</p>
                            <a href="{{ route('allergies.index') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Overzicht gezinsallergieën
                            </a>
                        </div>
                        
                        <div class="bg-green-50 border border-green-200 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-green-800 mb-3">Voedselpakketten</h3>
                            <p class="text-green-600 mb-4">Beheer en samenstellen van voedselpakketten</p>
                            <button class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-500 uppercase tracking-widest cursor-not-allowed">
                                Binnenkort beschikbaar
                            </button>
                        </div>
                        
                        <div class="bg-orange-50 border border-orange-200 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-orange-800 mb-3">Leveranciers</h3>
                            <p class="text-orange-600 mb-4">Beheer leveranciers en voorraden</p>
                            <button class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-500 uppercase tracking-widest cursor-not-allowed">
                                Binnenkort beschikbaar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
        </div>
    </div>
</div>

