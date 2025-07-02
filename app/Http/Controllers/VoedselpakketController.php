
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gezin;
use App\Models\Eetwens;

class VoedselpakketController extends Controller
{
    public function overzicht(Request $request)
    {
        $eetwensen = Eetwens::all();
        $eetwensId = $request->input('eetwens_id');

        $gezinnen = Gezin::with([
            'personen',
            'vertegenwoordiger',
            'voedselpakketten',
            'eetwensen',
        ])
        ->when($eetwensId, function($query) use ($eetwensId) {
            $query->whereHas('eetwensen', function($q) use ($eetwensId) {
                $q->where('eetwens_id', $eetwensId);
            });
        })
        ->whereHas('voedselpakketten')
        ->get();

        return view('voedselpakketen.overzicht', [
            'gezinnen' => $gezinnen,
            'eetwensen' => $eetwensen,
            'eetwensId' => $eetwensId,
        ]);
    }

    // public function details($id)
    // {
    //     $gezin = Gezin::with([
    //         'personen',
    //         'vertegenwoordiger',
    //         'voedselpakketten.producten',
    //         'eetwensen',
    //     ])->findOrFail($id);
    //
    //     return view('voedselpakketen.details', [
    //         'gezin' => $gezin,
    //     ]);
    // }

    public function edit($id)
    {
        $pakket = \App\Models\Voedselpakket::with('producten.product')->findOrFail($id);
        return view('voedselpakketen.edit', [
            'pakket' => $pakket,
            'statussen' => ['Uitgereikt', 'NietUitgereikt', 'NietMeerIngeschreven'],
        ]);
    }

    public function update(Request $request, $id)
    {
        $pakket = \App\Models\Voedselpakket::findOrFail($id);
        $oudStatus = $pakket->status;
        $pakket->status = $request->input('status');
        if ($pakket->status === 'Uitgereikt') {
            $pakket->datum_uitgifte = now()->toDateString();
        } elseif ($oudStatus === 'Uitgereikt' && $pakket->status !== 'Uitgereikt') {
            $pakket->datum_uitgifte = null;
        }
        $pakket->save();
        return redirect()
            ->route('voedselpakketen.details', ['id' => $pakket->gezin_id])
            ->with('success', 'De wijziging is doorgevoerd');
    }
}
    {
        $eetwensen = Eetwens::all();
        $eetwensId = $request->input('eetwens_id');

        $gezinnen = Gezin::with([
            'personen',
            'vertegenwoordiger',
            'voedselpakketten',
            'eetwensen',
        ])
        ->when($eetwensId, function($query) use ($eetwensId) {
            $query->whereHas('eetwensen', function($q) use ($eetwensId) {
                $q->where('eetwens_id', $eetwensId);
            });
        })
        ->whereHas('voedselpakketten')
        ->get();

        return view('voedselpakketen.overzicht', [
            'gezinnen' => $gezinnen,
            'eetwensen' => $eetwensen,
            'eetwensId' => $eetwensId,
        ]);
    }

    public function details($id)
    {
        $gezin = Gezin::with([
            'personen',
            'vertegenwoordiger',
            'voedselpakketten.producten',
            'eetwensen',
        ])->findOrFail($id);

        return view('voedselpakketen.details', [
            'gezin' => $gezin,
        ]);
    }
}
