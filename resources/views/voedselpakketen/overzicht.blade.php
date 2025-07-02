@extends('layouts.app')

@section('content')
    <style>
        .voedselpakket-header {
            color: green;
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
        .filter-bar {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
            justify-content: flex-end;
        }
        .btn-primary {
            background-color: #2563eb;
            color: #fff;
            border: none;
            padding: 6px 16px;
            border-radius: 6px;
            cursor: pointer;
        }
        .btn-primary:hover {
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
        .details-icon {
            font-size: 20px;
            color: #2563eb;
            text-decoration: none;
        }
        .details-icon:hover {
            color: #1d4ed8;
        }
    </style>

    <h2 class="voedselpakket-header">Overzicht gezinnen met voedselpakketten</h2>

    <div class="top-bar">
        <form method="GET" action="{{ route('voedselpakketen.overzicht') }}" style="display: flex; gap: 10px;">
            <select name="eetwens_id">
                <option value="">Selecteer Eetwens</option>
                @foreach($eetwensen as $ew)
                    <option value="{{ $ew->id }}" {{ (isset($eetwensId) && $eetwensId == $ew->id) ? 'selected' : '' }}>{{ $ew->naam }}</option>
                @endforeach
            </select>
            <button class="btn-primary" type="submit">Toon Gezinnen</button>
        </form>
    </div>

    <table class="voedselpakket-table">
        <thead>
            <tr>
                <th>Gezinsnaam</th>
                <th>Omschrijving</th>
                <th>Volwassenen</th>
                <th>Kinderen</th>
                <th>Babys</th>
                <th>Vertegenwoordiger</th>
                <th>Voedselpakket Details</th>
            </tr>
        </thead>
        <tbody>
            @if($gezinnen->isEmpty())
                <tr>
                    <td colspan="7">
                        <div class="empty-message">
                            @if(request('eetwens_id'))
                                Er zijn geen gezinnen bekend die de geselecteerde eetwens hebben
                            @else
                                Er zijn geen gezinnen met voedselpakketten gevonden.
                            @endif
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
                            <a href="{{ route('voedselpakketen.details', ['id' => $gezin->id]) }}" class="details-icon" title="Voedselpakket Details">
                                &#128230;
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    <div style="margin-top: 12px;">
        <a href="{{ url('/') }}" class="home-btn">home</a>
    </div>
@endsection
