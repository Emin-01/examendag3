@extends('layouts.app')

@section('content')
    <h2 style="color: green; text-decoration: underline;">Wijzig Product</h2>
    @if(session('success'))
        <div style="background: #d1fae5; color: #065f46; padding: 12px; border-radius: 4px; margin-bottom: 16px;">
            {{ session('success') }}
        </div>
    @endif
    <form method="POST" action="{{ route('producten.update', $product) }}">
        @csrf
        @method('PUT')
        <div style="margin-bottom: 16px;">
            <label for="houdbaarheidsdatum" style="font-weight: bold;">Houdbaarheidsdatum:</label>
            <input type="date" id="houdbaarheidsdatum" name="houdbaarheidsdatum"
                   value="{{ old('houdbaarheidsdatum', \Carbon\Carbon::parse($product->houdbaarheidsdatum)->format('Y-m-d')) }}"
                   style="padding: 6px 12px; border-radius: 6px; border: 1px solid #ddd;">
            @error('houdbaarheidsdatum')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn-primary">Wijzig Houdbaarheidsdatum</button>
        <a href="{{ url()->previous() }}" class="btn-secondary">Terug</a>
        <a href="{{ url('/') }}" class="home-btn">Home</a>
    </form>
@endsection
