@extends('layouts.app')

@section('title', $suti->nev)

@section('content')

<h1>{{ $suti->nev }}</h1>

<div class="box" style="max-width: 800px; margin: 2rem auto;">
    <div style="text-align: center; margin-bottom: 2rem;">
        <span style="font-size: 6rem;">🧁</span>
    </div>
    
    <dl class="style2">
        <dt><strong>Típus</strong></dt>
        <dd>{{ $suti->tipus }}</dd>
        
        <dt><strong>Díjazás</strong></dt>
        <dd>
            @if($suti->dijazott)
                <span style="color: #f56a6a; font-weight: bold;">⭐ Magyarország Tortája verseny díjazottja</span>
            @else
                Nem díjazott
            @endif
        </dd>
        
        @if($suti->tartalom->count() > 0)
            <dt><strong>Összetevők</strong></dt>
            <dd>
                @foreach($suti->tartalom as $t)
                    <span style="background: #e8f5e9; color: #2e7d32; padding: 0.3em 0.8em; border-radius: 5px; display: inline-block; margin: 0.2em;">
                        @if($t->mentes == 'G') 🌾 Gluténmentes
                        @elseif($t->mentes == 'L') 🥛 Laktózmentes
                        @elseif($t->mentes == 'C') 🍬 Cukormentes
                        @else {{ $t->mentes }}
                        @endif
                    </span>
                @endforeach
            </dd>
        @endif
        
        @if($suti->arak->count() > 0)
            <dt><strong>Árak</strong></dt>
            <dd>
                <table style="width: 100%; margin-top: 1em;">
                    <thead>
                        <tr style="border-bottom: 2px solid #ddd;">
                            <th style="text-align: left; padding: 0.5em;">Egység</th>
                            <th style="text-align: right; padding: 0.5em;">Ár</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($suti->arak as $ar)
                            <tr style="border-bottom: 1px solid #eee;">
                                <td style="padding: 0.5em;">{{ $ar->egyseg }}</td>
                                <td style="text-align: right; padding: 0.5em; font-weight: bold; color: #f56a6a;">
                                    {{ number_format($ar->ertek, 0, ',', ' ') }} Ft
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </dd>
        @endif
    </dl>
    
    <hr>
    
    <ul class="actions stacked">
        <li><a href="{{ route('sutik.index') }}" class="button">← Vissza a listához</a></li>
    </ul>
</div>

@endsection