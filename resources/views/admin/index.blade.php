@extends('layouts.app')

@section('title', 'Admin Vezérlőpult')

@section('content')

<div style="text-align: center; margin-bottom: 3rem;">
    <span style="font-size: 4rem;">⚙️</span>
    <h1 style="margin-top: 1rem;">Admin Vezérlőpult</h1>
    <p class="major">Statisztikák és gyors műveletek</p>
</div>

<!-- Statisztikák -->
<div class="items style3 medium">
    <div>
        <div class="inner" style="text-align: center;">
            <span class="icon major" style="font-size: 3rem;">👥</span>
            <h2 style="color: #47D3E5; font-size: 2.5rem; margin: 0.5rem 0;">{{ $userCount }}</h2>
            <h3>Felhasználók</h3>
        </div>
    </div>
    
    <div>
        <div class="inner" style="text-align: center;">
            <span class="icon major" style="font-size: 3rem;">🧁</span>
            <h2 style="color: #f56a6a; font-size: 2.5rem; margin: 0.5rem 0;">{{ $sutiCount }}</h2>
            <h3>Sütemények</h3>
        </div>
    </div>
    
    <div>
        <div class="inner" style="text-align: center;">
            <span class="icon major" style="font-size: 3rem;">✉️</span>
            <h2 style="color: #8965e0; font-size: 2.5rem; margin: 0.5rem 0;">{{ $uzenetCount }}</h2>
            <h3>Üzenetek</h3>
        </div>
    </div>
</div>

<hr class="major" style="margin: 4rem 0;">

<!-- Gyors műveletek -->
<div style="text-align: center; margin-top: 4rem;">
    <h2>⚡ Gyors Műveletek</h2>
    <p style="color: #666; margin-bottom: 2rem;">Válasszon az alábbi lehetőségek közül</p>
    
    <div class="items style2 big">
        <div>
            <div class="inner">
                <span style="font-size: 4rem;">➕</span>
                <h3>Új sütemény</h3>
                <p>Adjon hozzá új desszertet a kínálathoz</p>
                <ul class="actions stacked">
                    <li><a href="{{ route('sutik.create') }}" class="button primary">Hozzáadás</a></li>
                </ul>
            </div>
        </div>
        
        <div>
            <div class="inner">
                <span style="font-size: 4rem;">📋</span>
                <h3>Sütemények kezelése</h3>
                <p>Meglévő sütemények szerkesztése, törlése</p>
                <ul class="actions stacked">
                    <li><a href="{{ route('sutik.index') }}" class="button">Kezelés</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="items style2 big" style="margin-top: 2rem;">
        <div>
            <div class="inner">
                <span style="font-size: 4rem;">📊</span>
                <h3>Üzenetek</h3>
                <p>Beérkezett üzenetek megtekintése</p>
                <ul class="actions stacked">
                    <li><a href="{{ route('uzenetek.index') }}" class="button">Megtekintés</a></li>
                </ul>
            </div>
        </div>
        
        <div>
            <div class="inner">
                <span style="font-size: 4rem;">📈</span>
                <h3>Diagram</h3>
                <p>Statisztikai kimutatások megtekintése</p>
                <ul class="actions stacked">
                    <li><a href="{{ route('diagram') }}" class="button">Megtekintés</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- További információk -->
<div class="box" style="margin-top: 4rem; backgro