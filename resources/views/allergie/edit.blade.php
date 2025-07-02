@extends('layouts.app')

@section('content')
    <style>
        .allergie-header {
            color: green;
            text-decoration: underline;
        }
        .edit-form-container {
            max-width: 500px;
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
        .form-select, .form-input {
            width: 100%;
            padding: 8px 12px;
            border-radius: 6px;
            border: 1px solid #ddd;
            margin-bottom: 18px;
        }
        .btn-primary {
            background-color: #2563eb;
            color: #fff;
            border: none;
            padding: 8px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }
        .btn-primary:hover {
            background-color: #1d4ed8;
        }
        .btn-secondary {
            background-color: #2563eb;
            color: #fff;
            border: none;
            padding: 8px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            margin-left: 8px;
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
        .warning {
            background: #fffbe6;
            color: #b45309;
            border: 1px solid #ffe58f;
            border-radius: 4px;
            padding: 10px 16px;
            margin-bottom: 18px;
            font-size: 15px;
        }
    </style>
    <div class="edit-form-container">
        <h2 class="allergie-header" style="margin-bottom: 18px;">Allergie wijzigen</h2>
        <form method="POST" action="{{ route('allergie.update', ['id' => $persoon->id]) }}">
            @csrf
            @method('PUT')
            <div id="anafylactisch-warning" class="warning" style="display:none;"></div>
            <label for="allergie" class="form-label">Selecteer nieuwe allergie:</label>
            <select name="allergie_id" id="allergie" class="form-select">
                @foreach($allergies as $allergie)
                    <option value="{{ $allergie->id }}" data-anafylactisch="{{ $allergie->anafylactisch_risico ? '1' : '0' }}"
                        @if(isset($persoon->allergies) && $persoon->allergies->contains('id', $allergie->id)) selected @endif>
                        {{ $allergie->naam }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="btn-primary">Wijzig Allergie</button>
            <a href="{{ url()->previous() }}" class="btn-secondary">Terug</a>
            <a href="{{ route('dashboard') }}" class="home-btn">Home</a>
            <script>
                function checkAnafylactisch() {
                    var select = document.getElementById('allergie');
                    var warning = document.getElementById('anafylactisch-warning');
                    var selected = select.options[select.selectedIndex];
                    var naam = selected.textContent.trim().toLowerCase();
                    var isPinda = naam === 'pindas' || naam === 'pinda' || naam.includes('pinda');
                    if (isPinda) {
                        warning.style.display = 'block';
                        warning.style.background = '#fee2e2';
                        warning.style.color = '#b91c1c';
                        warning.style.border = '1px solid #fca5a5';
                        warning.textContent = 'Voor het wijzigen van deze allergie wordt geadviseerd eerst een arts te raadplegen vanwege een hoog risico op een anafylactisch shock';
                    } else {
                        warning.style.display = 'block';
                        warning.style.background = '#fffbe6';
                        warning.style.color = '#b45309';
                        warning.style.border = '1px solid #ffe58f';
                        warning.textContent = 'Voor het wijzigen van deze allergie wordt geadviseerd eerst een arts te raadplegen vanwege een hoog risico op een anafylactisch shock.';
                    }
                }
                document.getElementById('allergie').addEventListener('change', checkAnafylactisch);
                window.addEventListener('DOMContentLoaded', checkAnafylactisch);
            </script>
        </form>
    </div>
@endsection
