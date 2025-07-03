@extends('layouts.app')

@section('content')
    <style>
        .edit-header {
            color: green;
            text-decoration: underline;
            margin-bottom: 18px;
        }
        .edit-form-container {
            max-width: 420px;
            margin: 32px auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            padding: 32px 24px;
        }
        .form-label {
            font-weight: bold;
            margin-bottom: 6px;
            display: block;
        }
        .form-input {
            width: 100%;
            padding: 8px 12px;
            border-radius: 6px;
            border: 1px solid #ddd;
            margin-bottom: 18px;
        }
        .btn-primary {
            background-color: #6b7280;
            color: #fff;
            border: none;
            padding: 10px 22px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            margin-right: 12px;
        }
        .btn-primary:hover {
            background-color: #374151;
        }
        .btn-blue {
            background-color: #2563eb;
            color: #fff;
            border: none;
            padding: 10px 22px;
            border-radius: 6px;
            font-size: 16px;
            text-decoration: none;
            margin-right: 8px;
        }
        .btn-blue:hover {
            background-color: #1d4ed8;
        }
        .success-message {
            background: #d1fae5;
            color: #065f46;
            padding: 12px;
            border-radius: 4px;
            margin-bottom: 16px;
        }
    </style>
    <div class="edit-form-container">
        <h2 class="edit-header">Wijzig Product</h2>
        @if(session('success'))
            <div style="background: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 12px; border-radius: 4px; margin-bottom: 16px; font-weight: bold; text-align: center;">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div style="background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 12px; border-radius: 4px; margin-bottom: 16px; font-weight: bold; text-align: center;">
                {{ session('error') }}
            </div>
        @endif
        <form method="POST" action="{{ route('producten.update', $ppid) }}">
            @csrf
            @method('PUT')
            @if(isset($product->leverancier_id) && !is_array($product->leverancier_id))
                <input type="hidden" name="leverancier_id" value="{{ $product->leverancier_id }}">
            @endif
            <div style="margin-bottom: 16px;">
                <label for="houdbaarheidsdatum" class="form-label">Houdbaarheidsdatum:</label>
                <input type="date" id="houdbaarheidsdatum" name="houdbaarheidsdatum"
                       value="{{ old('houdbaarheidsdatum', $product->houdbaarheidsdatum ? \Carbon\Carbon::parse($product->houdbaarheidsdatum)->format('Y-m-d') : '') }}"
                       class="form-input">
                @error('houdbaarheidsdatum')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>
            <div style="margin-bottom: 16px;">
                <label for="datum_aangeleverd" class="form-label">Datum aangeleverd:</label>
                <input type="date" id="datum_aangeleverd" name="datum_aangeleverd"
                       value="{{ old('datum_aangeleverd', isset($datum_aangeleverd) && $datum_aangeleverd ? \Carbon\Carbon::parse($datum_aangeleverd)->format('Y-m-d') : '') }}"
                       class="form-input">
                @error('datum_aangeleverd')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>
            <div style="margin-bottom: 16px;">
                <label for="datum_eerst_volgende_levering" class="form-label">Datum eerstvolgende levering:</label>
                <input type="date" id="datum_eerst_volgende_levering" name="datum_eerst_volgende_levering"
                       value="{{ old('datum_eerst_volgende_levering', isset($datum_eerst_volgende_levering) && $datum_eerst_volgende_levering ? \Carbon\Carbon::parse($datum_eerst_volgende_levering)->format('Y-m-d') : '') }}"
                       class="form-input">
                @error('datum_eerst_volgende_levering')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn-primary">Wijzig Houdbaarheidsdatum</button>
            <a href="{{ url()->previous() }}" class="btn-blue">Terug</a>
            <a href="{{ url('/') }}" class="btn-blue">Home</a>
        </form>
    </div>
@endsection
