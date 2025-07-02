@extends('layouts.app')

@section('content')
    <style>
        .allergie-header {
            color: green;
            text-decoration: underline;
        }
        .allergie-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 16px;
            background: #fff;
        }
        .allergie-table th, .allergie-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .allergie-table th {
            background-color: #f9f9f9;
        }
        .top-bar {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
            justify-content: flex-end;
        }
        .btn-primary, .btn-secondary {
            background-color: #2563eb;
            color: #fff;
            border: none;
            padding: 6px 16px;
            border-radius: 6px;
            cursor: pointer;
        }
        .btn-primary:hover, .btn-secondary:hover {
            background-color: #1d4ed8;
        }
        .btn-icon {
            background: #2563eb;
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 6px 16px;
            font-size: 18px;
            cursor: pointer;
        }
        .btn-icon:hover {
            background-color: #1d4ed8;
        }
        .home-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #2563eb;
            color: #fff;
            border: none;
            padding: 8px 20px;
            border-radius: 8px;
            font-size: 16px;
            text-decoration: none;
            box-shadow: 0 2px 6px rgba(0,0,0,0.08);
        }
        .home-btn:hover {
            background-color: #1d4ed8;
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

    <h2 class="allergie-header">Overzicht gezinnen met allergieën</h2>

    <div class="top-bar">
        <form method="GET" action="{{ route('allergie.overzicht') }}" style="display: flex; gap: 10px;">
            @csrf
            <select name="allergie_id" class="border rounded px-2 py-1 h-8 text-[15px]">
                <option value="">Selecteer allergie</option>
                @foreach($allergies as $allergie)
                    <option value="{{ $allergie->id }}" {{ request('allergie_id') == $allergie->id ? 'selected' : '' }}>
                        {{ $allergie->naam }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="btn-secondary" style="margin:0;">Toon Gezinnen</button>
        </form>
    </div>

    <table class="allergie-table">
        <thead>
            <tr>
                <th>Gezinsnaam</th>
                <th>Omschrijving</th>
                <th>Volwassenen</th>
                <th>Kinderen</th>
                <th>Babys</th>
                <th>Vertegenwoordiger</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @if($gezinnen->isEmpty())
                <tr>
                    <td colspan="7">
                        <div class="empty-message">
                            Geen gezinnen gevonden.
                        </div>
                    </td>
                </tr>
            @else
                @foreach($gezinnen as $gezin)
                    @php
                        $vertegenwoordiger = $gezin->personen->where('is_vertegenwoordiger', true)->first();
                    @endphp
                    <tr>
                        <td>{{ $gezin->naam ?? '~~~~' }}</td>
                        <td>{{ $gezin->omschrijving ?? '~~~~' }}</td>
                        <td>{{ $gezin->aantal_volwassenen ?? '~~~~' }}</td>
                        <td>{{ $gezin->aantal_kinderen ?? '~~~~' }}</td>
                        <td>{{ $gezin->aantal_babys ?? '~~~~' }}</td>
                        <td>
                            {{ $vertegenwoordiger ? $vertegenwoordiger->voornaam . ' ' . $vertegenwoordiger->achternaam : '~~~~' }}
                        </td>
                        <td style="text-align: center;">
                            <a href="{{ route('allergie.details', ['id' => $gezin->id]) }}">
                                <button class="btn-icon" title="Bekijk details">&#128230;</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <a href="{{ route('dashboard') }}" class="home-btn">home</a>
@endsection
