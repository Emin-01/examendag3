@extends('layouts.app')

@section('content')
    <style>
        .producten-header {
            color: green;
            text-decoration: underline;
        }
        .success-message {
            background: #d1fae5;
            color: #065f46;
            padding: 12px;
            border-radius: 4px;
            margin-bottom: 16px;
            font-weight: bold;
            text-align: center;
        }
        .producten-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 16px;
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
        .info-table {
            margin-bottom: 18px;
            border-collapse: collapse;
        }
        .info-table td {
            border: 1px solid #eee;
            padding: 6px 16px;
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
    </style>
    <h2 class="producten-header">Overzicht producten</h2>
    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif
    <table class="info-table">
        <tr>
            <td><b>Naam:</b></td>
            <td>{{ $leverancier->naam }}</td>
        </tr>
        <tr>
            <td><b>Leveranciernummer:</b></td>
            <td>{{ $leverancier->leveranciernummer }}</td>
        </tr>
        <tr>
            <td><b>Leveranciertype:</b></td>
            <td>{{ $leverancier->type }}</td>
        </tr>
    </table>
    <table class="producten-table">
        <thead>
            <tr>
                <th>Naam</th>
                <th>Soort Allergie</th>
                <th>Barcode</th>
                <th>Houdbaarheidsdatum</th>
                <th>Datum Aangeleverd</th>
                <th>Datum Eerst Volgende Levering</th>
                <th>Wijzig Product</th>
            </tr>
        </thead>
        <tbody>
            @foreach($producten as $product)
                <tr>
                    <td>{{ $product->naam }}</td>
                    <td>{{ $product->soortallergie }}</td>
                    <td>{{ $product->barcode }}</td>
                    <td>{{ $product->houdbaarheidsdatum ? \Carbon\Carbon::parse($product->houdbaarheidsdatum)->format('d-m-Y') : '' }}</td>
                    <td>{{ $product->DatumAangeleverd ? \Carbon\Carbon::parse($product->DatumAangeleverd)->format('d-m-Y') : '' }}</td>
                    <td>{{ $product->DatumEerstVolgendeLevering ? \Carbon\Carbon::parse($product->DatumEerstVolgendeLevering)->format('d-m-Y') : '' }}</td>
                    <td style="text-align: center;">
                        <a href="{{ route('producten.edit', $product->ppid) }}" class="edit-icon" title="Wijzig Product">&#9998;</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div style="margin-top: 12px;">
        <a href="{{ url()->previous() }}" class="btn-secondary">terug</a>
        <a href="{{ url('/') }}" class="home-btn">home</a>
    </div>
@endsection
