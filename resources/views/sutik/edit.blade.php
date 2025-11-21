@extends('layouts.app')

@section('title', 'Sütemény szerkesztése')

@section('content')

<h1>✏️ Sütemény szerkesztése</h1>
<p class="major">{{ $suti->nev }}</p>

<div class="box" style="max-width: 800px; margin: 2rem auto;">
    <form action="{{ route('sutik.update', $suti->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="fields">
            <div class="field">
                <label for="nev">Sütemény neve *</label>
                <input type="text" name="nev" id="nev" value="{{ old('nev', $suti->nev) }}" required>
            </div>

            <div class="field">
                <label for="tipus">Típus *</label>
                <input type="text" name="tipus" id="tipus" value="{{ old('tipus', $suti->tipus) }}" required>
            </div>

            <div class="field">
                <input type="hidden" name="dijazott" value="0">
                <input type="checkbox" id="dijazott" name="dijazott" value="1" {{ old('dijazott', $suti->dijazott) ? 'checked' : '' }}>
                <label for="dijazott">Magyarország Tortája díjas</label>
            </div>

            <hr style="margin: 2rem 0;">
            <h3>💰 Ár szerkesztése</h3>

            @php
                $elsoAr = $suti->arak->first();
            @endphp

            <div class="field">
                <label for="ar_ertek">Ár (Ft)</label>
                <input type="number" name="ar_ertek" id="ar_ertek" value="{{ old('ar_ertek', $elsoAr->ertek ?? '') }}" placeholder="pl. 500">
            </div>

            <div class="field">
                <label for="ar_egyseg">Egység</label>
                <input type="text" name="ar_egyseg" id="ar_egyseg" value="{{ old('ar_egyseg', $elsoAr->egyseg ?? '') }}" placeholder="pl. szelet">
            </div>
        </div>

        <ul class="actions">
            <li><button type="submit" class="button primary">💾 Mentés</button></li>
            <li><a href="{{ route('sutik.index') }}" class="button">Mégse</a></li>
        </ul>
    </form>
</div>

@endsection