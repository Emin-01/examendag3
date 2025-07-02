<?php

namespace App\Http\Controllers;
use App\Models\Gezin;
use App\Models\Eetwens;
use Illuminate\Http\Request;

class GezinController extends Controller
{
    public function index(Request $request)
    {
        // Haal alle eetwensen op voor de dropdown
        $eetwensen = Eetwens::all();

        $eetwensId = $request->input('eetwens_id');

        // Alleen gezinnen met voedselpakketten
        $gezinnen = Gezin::with('personen')
            ->whereHas('voedselpakketten')
            ->when($eetwensId, function ($query) use ($eetwensId) {
                $query->whereHas('eetwensen', function ($q) use ($eetwensId) {
                    $q->where('eetwensen.id', $eetwensId);
                });
            })
            ->get();

        return view('voedselpakketen.overzicht', compact('gezinnen', 'eetwensen', 'eetwensId'));
    }
}


