<?php

namespace App\Http\Controllers;

use App\Models\Suti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiagramController extends Controller
{
    public function index()
    {
        // Sütemények típus szerint csoportosítva
        $tipusok = Suti::select('tipus', DB::raw('count(*) as count'))
            ->groupBy('tipus')
            ->get();

        // Díjazott sütemények száma
        $dijazott = Suti::where('dijazott', '!=', 0)->count();
        $nemDijazott = Suti::where('dijazott', '=', 0)->count();

        return view('diagram', compact('tipusok', 'dijazott', 'nemDijazott'));
    }
}