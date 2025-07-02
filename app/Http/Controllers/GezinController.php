<?php

namespace App\Http\Controllers;
use App\Models\Gezin;

use Illuminate\Support\Facades\DB;

class GezinController extends Controller
{
    public function index()
    {
        $gezinnen = \App\Models\Gezin::with('personen')->get();
        return view('voedselpakketen.overzicht', compact('gezinnen'));
    }
}
            

