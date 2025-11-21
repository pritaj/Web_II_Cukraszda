<?php

namespace App\Http\Controllers;

use App\Models\Suti;
use App\Models\Ar;
use Illuminate\Http\Request;

class SutiController extends Controller
{
    public function index(Request $request)
    {
        $query = Suti::with(['tartalom', 'arak']);

        if ($request->filled('tipus')) {
            $query->where('tipus', $request->tipus);
        }

        if ($request->filled('mentes')) {
            $query->whereHas('tartalom', function($q) use ($request) {
                $q->where('mentes', $request->mentes);
            });
        }

        if ($request->filled('dijazott')) {
            $query->where('dijazott', $request->dijazott);
        }

        $sutik = $query->paginate(12);
        $tipusok = Suti::distinct()->pluck('tipus');

        return view('sutik.index', compact('sutik', 'tipusok'));
    }

    public function show($id)
    {
        $suti = Suti::with(['tartalom', 'arak'])->findOrFail($id);
        return view('sutik.show', compact('suti'));
    }

    public function create()
    {
        return view('sutik.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nev' => 'required|string|max:255',
            'tipus' => 'required|string|max:255',
            'dijazott' => 'boolean',
            'ar_ertek' => 'nullable|numeric|min:0',
            'ar_egyseg' => 'nullable|string|max:255'
        ]);

        $suti = Suti::create([
            'nev' => $validated['nev'],
            'tipus' => $validated['tipus'],
            'dijazott' => $request->has('dijazott') ? 1 : 0
        ]);

        // Ár mentése ha meg van adva
        if (!empty($validated['ar_ertek']) && !empty($validated['ar_egyseg'])) {
            Ar::create([
                'suti_id' => $suti->id,
                'ertek' => $validated['ar_ertek'],
                'egyseg' => $validated['ar_egyseg']
            ]);
        }

        return redirect()->route('sutik.index')->with('success', 'Sütemény sikeresen hozzáadva!');
    }

    public function edit($id)
    {
        $suti = Suti::with('arak')->findOrFail($id);
        return view('sutik.edit', compact('suti'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nev' => 'required|string|max:255',
            'tipus' => 'required|string|max:255',
            'dijazott' => 'boolean',
            'ar_ertek' => 'nullable|numeric|min:0',
            'ar_egyseg' => 'nullable|string|max:255'
        ]);

        $suti = Suti::findOrFail($id);
        
        $suti->update([
            'nev' => $validated['nev'],
            'tipus' => $validated['tipus'],
            'dijazott' => $request->input('dijazott', 0)
        ]);

        // Ár frissítése vagy létrehozása
        if (!empty($validated['ar_ertek']) && !empty($validated['ar_egyseg'])) {
            $ar = $suti->arak()->first();
            if ($ar) {
                $ar->update([
                    'ertek' => $validated['ar_ertek'],
                    'egyseg' => $validated['ar_egyseg']
                ]);
            } else {
                Ar::create([
                    'suti_id' => $suti->id,
                    'ertek' => $validated['ar_ertek'],
                    'egyseg' => $validated['ar_egyseg']
                ]);
            }
        }

        return redirect()->route('sutik.index')->with('success', 'Sütemény sikeresen frissítve!');
    }

    public function destroy($id)
    {
        $suti = Suti::findOrFail($id);
        $suti->delete();

        return redirect()->route('sutik.index')->with('success', 'Sütemény sikeresen törölve!');
    }
}