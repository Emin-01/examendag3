@extends('layouts.app')

@section('content')
    <style>
        .pakket-header {
            color: green;
            text-decoration: underline;
        }
        .edit-form {
            background: #fff;
            padding: 24px 32px 32px 32px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            max-width: 480px;
            margin: 32px auto 0 auto;
        }
        .edit-form label {
            font-weight: bold;
            margin-bottom: 8px;
            display: block;
        }
        .edit-form select {
            width: 100%;
            padding: 8px;
            border-radius: 6px;
            border: 1px solid #ddd;
            margin-bottom: 16px;
        }
        .btn-primary {
            background-color: #2563eb;
            color: #fff;
            border: none;
            padding: 6px 16px;
            border-radius: 6px;
            cursor: pointer;
            margin-right: 8px;
        }
        .btn-primary:hover {
            background-color: #1d4ed8;
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
        .success-message {
            background: #e6ffed;
            color: #256029;
            border: 1px solid #b7eb8f;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 16px;
            text-align: center;
        }
    </style>
    <div class="edit-form">
        <h2 class="pakket-header">Wijzig voedselpakket status</h2>
        @if($melding)
            <div class="success-message" style="background: #fff3cd; color: #856404; border: 1px solid #ffeeba;">
                {{ $melding }}
            </div>
        @endif
        @if(session('success'))
            <div class="success-message" id="success-message">
                {{ session('success') }}
            </div>
            <script>
                setTimeout(function() {
                    window.location.href = "{{ route('voedselpakketen.details', $pakket->gezin_id) }}";
                }, 3000);
            </script>
        @endif
        <form method="POST" action="{{ route('voedselpakketen.update', $pakket->id) }}">
            @csrf
            @method('PUT')
            <label for="status">Status</label>
            <select name="status" id="status" @if($disabled) disabled @endif>
                @foreach($statussen as $status)
                    <option value="{{ $status }}" {{ $pakket->status == $status ? 'selected' : '' }}>{{ $status }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn-primary" @if($disabled) disabled @endif>Wijzig status voedselpakket</button>
            <a href="{{ route('voedselpakketen.details', $pakket->gezin_id) }}" class="btn-secondary">terug</a>
            <a href="{{ url('/') }}" class="home-btn">home</a>
        </form>
    </div>
@endsection
