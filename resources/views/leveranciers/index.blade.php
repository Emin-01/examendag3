@extends('layouts.app')

@section('content')
    <style>
        .leveranciers-header {
            color: green;
            text-decoration: underline;
        }
        .leveranciers-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        .leveranciers-table th, .leveranciers-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .leveranciers-table th {
            background-color: #f9f9f9;
        }
        .top-bar {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
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
        .btn-icon {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 18px;
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
        .btn-secondary {
            background-color: #2563eb;
            color: #fff;
            border: none;
            padding: 6px 16px;
            border-radius: 6px;
            cursor: pointer;
            margin-left: 8px;
        }
        .btn-secondary:hover {
            background-color: #1d4ed8;
        }
    </style>
    <h2 class="leveranciers-header">Overzicht Leveranciers</h2>
    <div class="top-bar">
        <form method="GET" action="{{ route('leveranciers.index') }}" style="display: flex; gap: 10px;">
            <select name="type">
                <option value="">Selecteer Leveranciertype</option>
                @foreach($leverancierTypes ?? [] as $type)
                    <option value="{{ $type }}" {{ request('type') == $type ? 'selected' : '' }}>{{ $type }}</option>
                @endforeach
            </select>
            <button class="btn-primary" type="submit">Toon Leveranciers</button>
        </form>
    </div>
    <table class="leveranciers-table">
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
            @php
                $rows = $leveranciers->filter(function($leverancier) {
                    // Filter Donor zonder contactgegevens uit de tabel
                    return !($leverancier->type === 'Donor' && empty($leverancier->contact?->email) && empty($leverancier->contact?->mobiel));
                });
            @endphp
            @if($rows->isEmpty())
                <tr>
                    <td colspan="7">
                        <div class="empty-message">
                            Er zijn geen leveranciers bekend van het geselecteerde leverancierstype
                        </div>
                    </td>
                </tr>
            @else
                @foreach($rows as $leverancier)
                    <tr>
                        <td>{{ $leverancier->naam }}</td>
                        <td>{{ $leverancier->contactpersoon }}</td>
                        <td>{{ $leverancier->contact->email ?? '' }}</td>
                        <td>{{ $leverancier->contact->mobiel ?? '' }}</td>
                        <td>{{ $leverancier->leveranciernummer }}</td>
                        <td>{{ $leverancier->type }}</td>
                        <td style="text-align: center;">
                            <a href="{{ route('producten.index', $leverancier->id) }}">
                                <button class="btn-icon" title="Product Details">🔍</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    <div style="margin-top: 12px;">
        <a href="{{ url()->previous() }}" class="btn-secondary">Terug</a>
        <a href="{{ url('/') }}" class="home-btn">Home</a>
    </div>
@endsection