<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Suti;
use App\Models\Uzenet;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $sutiCount = Suti::count();
        $uzenetCount = Uzenet::count();

        return view('admin.index', compact('userCount', 'sutiCount', 'uzenetCount'));
    }
}