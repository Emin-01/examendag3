@extends('layouts.app')

@section('content')
    <h2 style="color: green; text-decoration: underline;">Wijzig Product</h2>
    @if(session('success'))
        <div style="background: #d1fae5; color: #065f46; padding: 12px; border-radius: 4px; margin-bottom: 16px;">
            {{ session('success') }}
        </div>
    @endif
    <form method="POST" action="{{ route('producten.update', $ppid) }}">
        @csrf
        @method('PUT')
        <div style="margin-bottom: 16px;">
            <label for="naam" style="font-weight: bold;">Naam:</label>
            <input type="text" id="naam" name="naam" value="{{ old('naam', $product->naam) }}" style="padding: 6px 12px; border-radius: 6px; border: 1px solid #ddd;">
            @error('naam')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div style="margin-bottom: 16px;">
            <label for="soortallergie" style="font-weight: bold;">Soort Allergie:</label>
            <input type="text" id="soortallergie" name="soortallergie" value="{{ old('soortallergie', $product->soortallergie) }}" style="padding: 6px 12px; border-radius: 6px; border: 1px solid #ddd;">
            @error('soortallergie')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div style="margin-bottom: 16px;">
            <label for="barcode" style="font-weight: bold;">Barcode:</label>
            <input type="text" id="barcode" name="barcode" value="{{ old('barcode', $product->barcode) }}" style="padding: 6px 12px; border-radius: 6px; border: 1px solid #ddd;">
            @error('barcode')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div style="margin-bottom: 16px;">
            <label for="houdbaarheidsdatum" style="font-weight: bold;">Houdbaarheidsdatum:</label>
            <input type="date" id="houdbaarheidsdatum" name="houdbaarheidsdatum"
                   value="{{ old('houdbaarheidsdatum', $product->houdbaarheidsdatum ? \Carbon\Carbon::parse($product->houdbaarheidsdatum)->format('Y-m-d') : '') }}"
                   style="padding: 6px 12px; border-radius: 6px; border: 1px solid #ddd;">
            @error('houdbaarheidsdatum')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div style="margin-bottom: 16px;">
            <label for="datum_aangeleverd" style="font-weight: bold;">Datum Aangeleverd:</label>
            <input type="date" id="datum_aangeleverd" name="datum_aangeleverd"
                   value="{{ old('datum_aangeleverd', $datum_aangeleverd ? \Carbon\Carbon::parse($datum_aangeleverd)->format('Y-m-d') : '') }}"
                   style="padding: 6px 12px; border-radius: 6px; border: 1px solid #ddd;">
            @error('datum_aangeleverd')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div style="margin-bottom: 16px;">
            <label for="datum_eerst_volgende_levering" style="font-weight: bold;">Datum Eerst Volgende Levering:</label>
            <input type="date" id="datum_eerst_volgende_levering" name="datum_eerst_volgende_levering"
                   value="{{ old('datum_eerst_volgende_levering', $datum_eerst_volgende_levering ? \Carbon\Carbon::parse($datum_eerst_volgende_levering)->format('Y-m-d') : '') }}"
                   style="padding: 6px 12px; border-radius: 6px; border: 1px solid #ddd;">
            @error('datum_eerst_volgende_levering')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn-primary">Opslaan</button>
        <a href="{{ url()->previous() }}" class="btn-secondary">Terug</a>
        <a href="{{ url('/') }}" class="home-btn">Home</a>
    </form>
@endsection
