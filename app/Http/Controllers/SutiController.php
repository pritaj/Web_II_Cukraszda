<?php

namespace App\Http\Controllers;

use App\Models\Suti;
use Illuminate\Http\Request;

class SutiController extends Controller
{
    public function index(Request $request)
    {
        $query = Suti::with(['tartalom', 'arak']);

        // Szűrés típus szerint
        if ($request->filled('tipus')) {
            $query->where('tipus', $request->tipus);
        }

        // Szűrés mentes szerint
        if ($request->filled('mentes')) {
            $query->whereHas('tartalom', function($q) use ($request) {
                $q->where('mentes', $request->mentes);
            });
        }

        // Szűrés díjazott szerint
        if ($request->filled('dijazott')) {
            $query->where('dijazott', $request->dijazott);
        }

        $sutik = $query->paginate(12);
        
        // Típusok lekérése
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
            'dijazott' => 'boolean'
        ]);

        Suti::create($validated);

        return redirect()->route('sutik.index')->with('success', 'Sütemény sikeresen hozzáadva!');
    }

    public function edit($id)
    {
        $suti = Suti::findOrFail($id);
        return view('sutik.edit', compact('suti'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nev' => 'required|string|max:255',
            'tipus' => 'required|string|max:255',
            'dijazott' => 'boolean'
        ]);

        $suti = Suti::findOrFail($id);
        $suti->update($validated);

        return redirect()->route('sutik.index')->with('success', 'Sütemény sikeresen frissítve!');
    }

    public function destroy($id)
    {
        $suti = Suti::findOrFail($id);
        $suti->delete();

        return redirect()->route('sutik.index')->with('success', 'Sütemény sikeresen törölve!');
    }
}