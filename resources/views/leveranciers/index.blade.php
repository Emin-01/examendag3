@extends('layouts.app')

@section('content')
    <h2 style="color: green; text-decoration: underline;">Overzicht Leveranciers</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Naam</th>
                <th>Contactpersoon</th>
                <th>Email</th>
                <th>Mobiel</th>
                <th>Leveranciernummer</th>
                <th>LeverancierType</th>
                <th>Product Details</th>
            </tr>
        </thead>
        <tbody>
            @foreach($leveranciers as $leverancier)
                <tr>
                    <td>{{ $leverancier->naam }}</td>
                    <td>{{ $leverancier->contactpersoon }}</td>
                    <td>{{ $leverancier->email }}</td>
                    <td>{{ $leverancier->mobiel }}</td>
                    <td>{{ $leverancier->leveranciernummer }}</td>
                    <td>{{ $leverancier->type }}</td>
                    <td>
                        {{-- Voeg hier een link of knop toe voor product details indien gewenst --}}
                        <a href="#">🔍</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ url('/') }}">Home</a>
@endsection