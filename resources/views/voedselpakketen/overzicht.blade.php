@extends('layouts.app')

@section('content')
    <style>
        .voedselpakket-header {
            color: #2563eb;
            text-decoration: underline;
        }
        .voedselpakket-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 16px;
            background: #fff;
        }
        .voedselpakket-table th, .voedselpakket-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .voedselpakket-table th {
            background-color: #f9f9f9;
        }
        .empty-message {
            background: #fffbe6;
            color: #666;
            padding: 12px;
            border-radius: 4px;
            border: 1px solid #ffe58f;
            text-align: center;
        }
        .test-btn {
            background: #2563eb;
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 6px 16px;
            cursor: pointer;
        }
        .test-btn:hover {
            background: #1d4ed8;
        }
    </style>

    <div style="background: #e0ffe0; color: #065f46; padding: 10px; border-radius: 4px; margin-bottom: 12px;">
        Dit is het overzicht van voedselpakketten (test werkt!)
    </div>

    <h2 class="voedselpakket-header">Overzicht Voedselpakketten</h2>

    <table class="voedselpakket-table">
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
                        <td>{{ $gezin->naam }}</td>
                        <td>{{ $gezin->omschrijving }}</td>
                        <td>{{ $gezin->aantal_volwassenen }}</td>
                        <td>{{ $gezin->aantal_kinderen }}</td>
                        <td>{{ $gezin->aantal_babys }}</td>
                        <td>
                            {{ $vertegenwoordiger ? $vertegenwoordiger->voornaam . ' ' . $vertegenwoordiger->achternaam : '' }}
                        </td>
                        <td>
                            <button class="test-btn" onclick="alert('Testknop werkt!')">Test</button>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection
