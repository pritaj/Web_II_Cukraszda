@extends('layouts.app')

@section('title', 'Kapcsolat')

@section('content')

<div style="text-align: center; margin-bottom: 3rem;">
    <span style="font-size: 4rem;">📞</span>
    <h1 style="margin-top: 1rem;">Lépjen kapcsolatba velünk!</h1>
    <p class="major">Várjuk megkeresését!</p>
</div>

<!-- Két oszlopos elrendezés -->
<div style="display: flex; flex-wrap: wrap; gap: 3rem; margin: 3rem 0;">
    
    <!-- Bal oldal: Elérhetőségek -->
    <div style="flex: 1; min-width: 300px;">
        <div class="box">
            <h2>📍 Elérhetőségeink</h2>
            <hr>
            
            <div style="margin: 2rem 0;">
                <h3 style="color: #47D3E5; margin-bottom: 0.5rem;">Cím</h3>
                <p style="font-size: 1.1rem; margin-bottom: 2rem;">
                    1052 Budapest<br>
                    Petőfi Sándor utca 5.
                </p>

                <h3 style="color: #47D3E5; margin-bottom: 0.5rem;">Telefon</h3>
                <p style="font-size: 1.1rem; margin-bottom: 2rem;">
                    <a href="tel:+3612345678" style="text-decoration: none;">+36 1 234 5678</a>
                </p>

                <h3 style="color: #47D3E5; margin-bottom: 0.5rem;">Email</h3>
                <p style="font-size: 1.1rem; margin-bottom: 2rem;">
                    <a href="mailto:info@cukraszda.hu" style="text-decoration: none;">info@cukraszda.hu</a>
                </p>

                <h3 style="color: #47D3E5; margin-bottom: 0.5rem;">🕐 Nyitvatartás</h3>
                <p style="font-size: 1rem; line-height: 1.8;">
                    <strong>Hétfő - Péntek:</strong> 8:00 - 18:00<br>
                    <strong>Szombat:</strong> 9:00 - 14:00<br>
                    <strong>Vasárnap:</strong> Zárva
                </p>
            </div>
        </div>
    </div>

    <!-- Jobb oldal: Űrlap -->
    <div style="flex: 1; min-width: 300px;">
        <div class="box">
            <h2>✉️ Küldjön üzenetet</h2>
            <hr>
            
            <form action="{{ route('kapcsolat.store') }}" method="POST">
                @csrf

                <div class="fields">
                    <div class="field half">
                        <label for="nev">Név *</label>
                        <input type="text" name="nev" id="nev" placeholder="Kovács János" required>
                    </div>

                    <div class="field half">
                        <label for="email">Email *</label>
                        <input type="email" name="email" id="email" placeholder="kovacs@example.com" required>
                    </div>

                    <div class="field">
                        <label for="uzenet">Üzenet *</label>
                        <textarea name="uzenet" id="uzenet" rows="8" placeholder="Írja meg üzenetét..." required></textarea>
                    </div>
                </div>

                <ul class="actions">
                    <li><button type="submit" class="button primary large fit">📨 Üzenet küldése</button></li>
                </ul>
            </form>
        </div>
    </div>

</div>

<!-- Alsó info box -->
<div class="box" style="background: #f8f9fa; border: none; text-align: center; margin-top: 3rem;">
    <p style="margin: 0; font-size: 1.1rem;">
        💬 <strong>Válaszidő:</strong> Üzeneteit 24 órán belül megválaszoljuk!<br>
        🎂 Egyedi tortarendeléshez hívjon telefonon!
    </p>
</div>

@endsection