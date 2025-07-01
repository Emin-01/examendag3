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
    </style>
    <h2 class="leveranciers-header">Overzicht Leveranciers</h2>
    <div class="top-bar">
        <select>
            <option selected>Selecteer Leveranciertype</option>
            <option value="">Alle</option>
            @foreach($leverancierTypes ?? [] as $type)
                <option value="{{ $type }}">{{ $type }}</option>
            @endforeach
        </select>
        <button class="btn-primary">Toon Leveranciers</button>
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
            @foreach($leveranciers as $leverancier)
                <tr>
                    <td>{{ $leverancier->naam }}</td>
                    <td>{{ $leverancier->contactpersoon }}</td>
                    <td>{{ $leverancier->email }}</td>
                    <td>{{ $leverancier->mobiel }}</td>
                    <td>{{ $leverancier->leveranciernummer }}</td>
                    <td>{{ $leverancier->type }}</td>
                    <td style="text-align: center;">
                        <button class="btn-icon" title="Product Details">🔍</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ url('/') }}" class="home-btn">Home</a>
@endsection