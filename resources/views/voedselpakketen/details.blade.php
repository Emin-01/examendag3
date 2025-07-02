@extends('layouts.app')

@section('content')
    <style>
        .pakket-header {
            color: green;
            text-decoration: underline;
        }
        .info-table {
            margin-bottom: 18px;
            border-collapse: collapse;
            background: #fff;
        }
        .info-table td {
            border: 1px solid #eee;
            padding: 6px 16px;
        }
        .producten-table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
        }
        .producten-table th, .producten-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .producten-table th {
            background-color: #f9f9f9;
        }
        .btn-secondary {
            background-color: #2563eb;
            color: #fff;
            border: none;
            padding: 6px 16px;
            border-radius: 6px;
            cursor: pointer;
            margin-right: 8px;
        }
        .btn-secondary:hover {
            background-color: #1d4ed8;
        }
        .home-btn {
            background-color: #2563eb;
            color: #fff;
            border: none;
            padding: 8px 20px;
            border-radius: 8px;
            font-size: 16px;
            text-decoration: none;
            margin-left: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.08);
        }
        .home-btn:hover {
            background-color: #1d4ed8;
        }
    </style>
    <h2 class="pakket-header">Voedselpakket details voor {{ $gezin->naam ?? '~~~~' }}</h2>
    <table class="info-table">
        <tr>
            <td><b>Gezinsnaam:</b></td>
            <td>{{ $gezin->naam ?? '~~~~' }}</td>
        </tr>
        <tr>
            <td><b>Omschrijving:</b></td>
            <td>{{ $gezin->omschrijving ?? '~~~~' }}</td>
        </tr>
        <tr>
            <td><b>Totaal aantal Personen:</b></td>
            <td>{{ $gezin->personen->count() ?? '~~~~' }}</td>
        </tr>
    </table>
    <h3 style="margin-bottom: 8px;">Voedselpakketten</h3>
    <table class="producten-table" style="margin-bottom: 18px;">
        <thead>
            <tr>
                <th>Pakketnummer</th>
                <th>Datum samenstelling</th>
                <th>Datum uitgifte</th>
                <th>Status</th>
                <th>Aantal producten</th>
                <th>Wijzig Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($gezin->voedselpakketten as $pakket)
                <tr>
                    <td>{{ $pakket->pakket_nummer }}</td>
                    <td>{{ $pakket->datum_samenstelling }}</td>
                    <td>{{ $pakket->datum_uitgifte ?? '-' }}</td>
                    <td>{{ $pakket->status }}</td>
                    <td>{{ $pakket->producten->count() }}</td>
                    <td style="text-align: center;">
                        <a href="{{ route('voedselpakketen.edit', $pakket->id) }}" class="details-icon" title="Wijzig Status">&#9998;</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Geen voedselpakketten gevonden voor dit gezin.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div style="margin-top: 12px;">
        <a href="{{ url()->previous() }}" class="btn-secondary">Terug</a>
        <a href="{{ url('/') }}" class="home-btn">Home</a>
    </div>
@endsection
