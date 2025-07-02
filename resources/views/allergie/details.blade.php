@extends('layouts.app')

@section('content')
    <style>
        .allergie-header {
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
        .personen-table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
        }
        .personen-table th, .personen-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .personen-table th {
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
            padding: 6px 16px;
            border-radius: 6px;
            font-size: 16px;
            text-decoration: none;
            margin-left: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.08);
        }
        .home-btn:hover {
            background-color: #1d4ed8;
        }
        .edit-icon {
            color: #2563eb;
            font-size: 18px;
            text-decoration: none;
        }
        .edit-icon:hover {
            color: #1d4ed8;
        }
        .empty-message {
            background: #fffbe6;
            color: #666;
            padding: 12px;
            border-radius: 4px;
            border: 1px solid #ffe58f;
            text-align: center;
        }
    </style>
    <h2 class="allergie-header">Allergieën in het gezin</h2>
    <table class="info-table">
        <tr>
            <td><b>Gezinsnaam:</b></td>
            <td>{{ $gezinnen->naam ?? '~~~~' }}</td>
        </tr>
        <tr>
            <td><b>Omschrijving:</b></td>
            <td>{{ $gezinnen->omschrijving ?? '~~~~' }}</td>
        </tr>
        <tr>
            <td><b>Totaal aantal Personen:</b></td>
            <td>{{ $gezinnen->personen->count() ?? '~~~~' }}</td>
        </tr>
    </table>
    <table class="personen-table">
        <thead>
            <tr>
                <th>Naam</th>
                <th>Type Persoon</th>
                <th>Gezinsrol</th>
                <th>Allergie</th>
                <th>Wijzig Allergie</th>
            </tr>
        </thead>
        <tbody>
            @forelse($gezinnen->personen as $persoon)
                <tr>
                    <td>{{ $persoon->voornaam }} {{ $persoon->achternaam }}</td>
                    <td>{{ $persoon->type_persoon ?? '~~~~' }}</td>
                    <td>
                        {{ $persoon->is_vertegenwoordiger ? 'Vertegenwoordiger' : 'Gezinslid' }}
                    </td>
                    <td>
                        @php
                            $allergieNamen = $persoon->allergies->pluck('naam')->implode(', ');
                        @endphp
                        {{ $allergieNamen ?: 'Geen' }}
                    </td>
                    <td style="text-align: center;">
                        <a href="{{ route('allergie.edit', ['id' => $persoon->id]) }}" class="edit-icon" title="Wijzig Allergie">&#9998;</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">
                        <div class="empty-message">
                            Geen personen gevonden.
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div style="margin-top: 12px;">
        <a href="{{ url()->previous() }}" class="btn-secondary">Terug</a>
        <a href="{{ route('dashboard') }}" class="home-btn">Home</a>
    </div>
@endsection
