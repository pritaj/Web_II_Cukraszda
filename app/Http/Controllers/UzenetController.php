<?php

namespace App\Http\Controllers;

use App\Models\Uzenet;
use Illuminate\Http\Request;

class UzenetController extends Controller
{
    // Kapcsolat űrlap megjelenítése
    public function create()
    {
        return view('kapcsolat');
    }

    // Üzenet mentése
    public function store(Request $request)
    {
        $request->validate([
            'nev' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'uzenet' => 'required|string',
        ]);

        Uzenet::create($request->all());

        return redirect()->route('kapcsolat')
            ->with('success', 'Üzenet sikeresen elküldve!');
    }

    // Üzenetek listája (csak bejelentkezve)
    public function index()
    {
        $uzenetek = Uzenet::orderBy('created_at', 'desc')->paginate(15);
        return view('uzenetek.index', compact('uzenetek'));
    }
}