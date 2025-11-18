@extends('layouts.app')

@section('title', 'Sütemények')

@section('content')

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; flex-wrap: wrap;">
    <div>
        <h1 style="margin: 0;">🧁 Süteménykínálatunk</h1>
        <p class="major" style="margin: 0.5rem 0 0 0;">Válasszon ínycsiklandó desszertjeink közül!</p>
    </div>
    
    @if(auth()->check() && auth()->user()->role === 'admin')
        <div style="margin-top: 1rem;">
            <a href="{{ route('sutik.create') }}" class="button primary">➕ Új sütemény</a>
        </div>
    @endif
</div>

<!-- Szűrők -->
<div class="box" style="margin-bottom: 3rem;">
    <form method="GET" action="{{ route('sutik.index') }}">
        <div class="fields">
            <div class="field">
                <label for="tipus">Típus</label>
                <select name="tipus" id="tipus">
                    <option value="">Összes</option>
                    @foreach($tipusok as $tipus)
                        <option value="{{ $tipus }}" {{ request('tipus') == $tipus ? 'selected' : '' }}>
                            {{ $tipus }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="field">
                <label for="mentes">Mentes</label>
                <select name="mentes" id="mentes">
                    <option value="">Összes</option>
                    <option value="G" {{ request('mentes') == 'G' ? 'selected' : '' }}>Gluténmentes</option>
                    <option value="L" {{ request('mentes') == 'L' ? 'selected' : '' }}>Laktózmentes</option>
                    <option value="C" {{ request('mentes') == 'C' ? 'selected' : '' }}>Cukormentes</option>
                </select>
            </div>
            
            <div class="field">
                <label for="dijazott">Díjazás</label>
                <select name="dijazott" id="dijazott">
                    <option value="">Összes</option>
                    <option value="1" {{ request('dijazott') == '1' ? 'selected' : '' }}>Díjazott</option>
                </select>
            </div>
        </div>
        
        <ul class="actions">
            <li><button type="submit" class="button primary">Szűrés</button></li>
            <li><a href="{{ route('sutik.index') }}" class="button">Törlés</a></li>
        </ul>
    </form>
</div>

<!-- Sütemények listája -->
@if($sutik->count() > 0)
    <div class="items style1 medium">
        @foreach($sutik as $suti)
            <div>
                <div class="inner">
                    <span class="icon major" style="font-size: 3rem;">🧁</span>
                    
                    <h3>{{ $suti->nev }}</h3>
                    
                    <p>
                        <strong>Típus:</strong> {{ $suti->tipus }}<br>
                        
                        @if($suti->dijazott)
                            <span style="color: #f56a6a;">⭐ Magyarország Tortája díjas</span><br>
                        @endif
                        
                        @if($suti->tartalom->count() > 0)
                            <strong>Mentes:</strong> 
                            @foreach($suti->tartalom as $t)
                                <span class="badge" style="background: #e8f5e9; color: #2e7d32; padding: 0.2em 0.6em; border-radius: 3px; font-size: 0.85em; margin: 0 0.2em;">
                                    @if($t->mentes == 'G') Gluténmentes
                                    @elseif($t->mentes == 'L') Laktózmentes
                                    @elseif($t->mentes == 'C') Cukormentes
                                    @else {{ $t->mentes }}
                                    @endif
                                </span>
                            @endforeach
                            <br>
                        @endif
                        
                        @if($suti->arak->count() > 0)
                            <strong>Árak:</strong><br>
                            @foreach($suti->arak as $ar)
                                • {{ number_format($ar->ertek, 0, ',', ' ') }} Ft / {{ $ar->egyseg }}<br>
                            @endforeach
                        @endif
                    </p>
                    
                    <ul class="actions stacked">
                        <li><a href="{{ route('sutik.show', $suti->id) }}" class="button small">Részletek</a></li>
                        
                        @if(auth()->check() && auth()->user()->role === 'admin')
                            <li><a href="{{ route('sutik.edit', $suti->id) }}" class="button small">✏️ Szerkesztés</a></li>
                            <li>
                                <form action="{{ route('sutik.destroy', $suti->id) }}" method="POST" onsubmit="return confirm('Biztosan törli ezt a süteményt?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="button small" style="background: #dc3545; width: 100%;">🗑️ Törlés</button>
                                </form>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
    
    <!-- Lapozás középre igazítva -->
    @if($sutik->hasPages())
        <div style="text-align: center; margin: 4rem auto 2rem; clear: both; max-width: 1200px;">
            <ul class="actions special" style="justify-content: center; flex-wrap: wrap;">
                {{-- Előző gomb --}}
                @if($sutik->onFirstPage())
                    <li><span class="button disabled" style="opacity: 0.3; pointer-events: none;">← Előző</span></li>
                @else
                    <li><a href="{{ $sutik->appends(request()->query())->previousPageUrl() }}" class="button">← Előző</a></li>
                @endif
                
                {{-- Oldalszámok --}}
                @foreach(range(1, $sutik->lastPage()) as $page)
                    @if($page == $sutik->currentPage())
                        <li><span class="button primary">{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $sutik->appends(request()->query())->url($page) }}" class="button">{{ $page }}</a></li>
                    @endif
                @endforeach
                
                {{-- Következő gomb --}}
                @if($sutik->hasMorePages())
                    <li><a href="{{ $sutik->appends(request()->query())->nextPageUrl() }}" class="button">Következő →</a></li>
                @else
                    <li><span class="button disabled" style="opacity: 0.3; pointer-events: none;">Következő →</span></li>
                @endif
            </ul>
            
            <p style="margin-top: 1.5rem; color: #666; font-size: 0.9rem;">
                Megjelenítve: <strong>{{ $sutik->firstItem() }}-{{ $sutik->lastItem() }}</strong> / <strong>{{ $sutik->total() }}</strong> sütemény
            </p>
        </div>
    @endif
    
@else
    <div class="box" style="background: #fff3cd; border: 2px solid #ffc107; color: #856404; padding: 2em; text-align: center;">
        <p style="margin: 0; font-size: 1.2em;">🔍 Nincs találat a szűrési feltételeknek megfelelően.</p>
        <a href="{{ route('sutik.index') }}" class="button small" style="margin-top: 1em;">Összes sütemény</a>
    </div>
@endif

@endsection