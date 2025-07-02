@extends('layouts.app')
@section('content')
    <div class="max-w-2xl mx-auto mt-10 bg-white rounded-lg shadow border border-gray-200 p-6">
        <h1 class="text-2xl font-semibold text-green-800 mb-6">Klant Details</h1>
        @if(session('status'))
            <div class="mb-6 px-4 py-3 rounded bg-green-100 text-green-800 font-semibold text-center">
                {{ session('status') }}
            </div>
            <script>
                setTimeout(function() {
                    window.location.href = "{{ route('klanten.show', $klant['id'] ?? 1) }}";
                }, 3000);
            </script>
        @endif
        <table class="w-full mb-8 border border-gray-200 rounded">
            <tbody>
                <tr><td class="py-2 px-4 font-semibold w-1/3">Voornaam</td><td class="py-2 px-4">{{ $klant['voornaam'] ?? '' }}</td></tr>
                <tr><td class="py-2 px-4 font-semibold">Tussenvoegsel</td><td class="py-2 px-4">{{ $klant['tussenvoegsel'] ?? '' }}</td></tr>
                <tr><td class="py-2 px-4 font-semibold">Achternaam</td><td class="py-2 px-4">{{ $klant['achternaam'] ?? '' }}</td></tr>
                <tr><td class="py-2 px-4 font-semibold">Geboortedatum</td><td class="py-2 px-4">{{ $klant['geboortedatum'] ?? '' }}</td></tr>
                <tr><td class="py-2 px-4 font-semibold">TypePersoon</td><td class="py-2 px-4">{{ $klant['type_persoon'] ?? '' }}</td></tr>
                <tr><td class="py-2 px-4 font-semibold">Vertegenwoordiger</td><td class="py-2 px-4">{{ $klant['vertegenwoordiger'] ?? '' }}</td></tr>
                <tr><td class="py-2 px-4 font-semibold">Straatnaam</td><td class="py-2 px-4">{{ $klant['straatnaam'] ?? '' }}</td></tr>
                <tr><td class="py-2 px-4 font-semibold">Huisnummer</td><td class="py-2 px-4">{{ $klant['huisnummer'] ?? '' }}</td></tr>
                <tr><td class="py-2 px-4 font-semibold">Toevoeging</td><td class="py-2 px-4">{{ $klant['toevoeging'] ?? '' }}</td></tr>
                <tr><td class="py-2 px-4 font-semibold">Postcode</td><td class="py-2 px-4">{{ $klant['postcode'] ?? '' }}</td></tr>
                <tr><td class="py-2 px-4 font-semibold">Woonplaats</td><td class="py-2 px-4">{{ $klant['woonplaats'] ?? '' }}</td></tr>
                <tr><td class="py-2 px-4 font-semibold">Email</td><td class="py-2 px-4">{{ $klant['email'] ?? '' }}</td></tr>
                <tr><td class="py-2 px-4 font-semibold">Mobiel</td><td class="py-2 px-4">{{ $klant['mobiel'] ?? '' }}</td></tr>
            </tbody>
        </table>
        <div class="flex flex-wrap gap-2 justify-end">
            <a href="{{ route('klanten.edit', $klant['id']) }}" class="btn-primary">Wijzig</a>
            <a href="{{ route('klanten.index') }}" class="btn-secondary">Terug</a>
            <a href="{{ route('dashboard') }}" class="home-btn">Home</a>
        </div>
    </div>
@endsection

<style>
.home-btn {
    background-color: #2563eb;
    color: #fff;
    border: none;
    padding: 8px 20px;
    border-radius: 8px;
    font-size: 16px;
    text-decoration: none;
    box-shadow: 0 2px 6px rgba(0,0,0,0.08);
    margin-left: 10px;
}
.home-btn:hover {
    background-color: #1d4ed8;
}
.btn-secondary {
    background-color: #2563eb;
    color: #fff;
    border: none;
    padding: 6px 16px;
    border-radius: 6px;
    cursor: pointer;
    margin-left: 8px;
    text-decoration: none;
    display: inline-block;
}
.btn-secondary:hover {
    background-color: #1d4ed8;
}
.btn-primary {
    background-color: #2563eb;
    color: #fff;
    border: none;
    padding: 6px 16px;
    border-radius: 6px;
    cursor: pointer;
    margin-left: 8px;
    text-decoration: none;
    display: inline-block;
}
.btn-primary:hover {
    background-color: #1d4ed8;
}
</style>

