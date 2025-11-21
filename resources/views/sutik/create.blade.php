@extends('layouts.app')

@section('title', 'Új sütemény')

@section('content')

<h1>➕ Új sütemény hozzáadása</h1>
<p class="major">Töltse ki az alábbi űrlapot</p>

<div class="box" style="max-width: 800px; margin: 2rem auto;">
    <form action="{{ route('sutik.store') }}" method="POST">
        @csrf

        <div class="fields">
            <div class="field">
                <label for="nev">Sütemény neve *</label>
                <input type="text" name="nev" id="nev" value="{{ old('nev') }}" required placeholder="pl. Dobostorta">
            </div>

            <div class="field">
                <label for="tipus">Típus *</label>
                <input type="text" name="tipus" id="tipus" value="{{ old('tipus') }}" required placeholder="pl. torta">
            </div>

            <div class="field">
                <input type="checkbox" id="dijazott" name="dijazott" value="1" {{ old('dijazott') ? 'checked' : '' }}>
                <label for="dijazott">Magyarország Tortája díjas</label>
            </div>

            <hr style="margin: 2rem 0;">
            <h3>💰 Ár hozzáadása</h3>

            <div class="field">
                <label for="ar_ertek">Ár (Ft)</label>
                <input type="number" name="ar_ertek" id="ar_ertek" value="{{ old('ar_ertek') }}" placeholder="pl. 500">
            </div>

            <div class="field">
                <label for="ar_egyseg">Egység</label>
                <input type="text" name="ar_egyseg" id="ar_egyseg" value="{{ old('ar_egyseg') }}" placeholder="pl. szelet">
            </div>
        </div>

        <ul class="actions">
            <li><button type="submit" class="button primary">💾 Mentés</button></li>
            <li><a href="{{ route('sutik.index') }}" class="button">Mégse</a></li>
        </ul>
    </form>
</div>

@endsection