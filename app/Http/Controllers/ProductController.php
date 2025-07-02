<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leverancier;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index($leverancierId)
    {
        $leverancier = Leverancier::findOrFail($leverancierId);

        // Haal producten op via de tussenliggende tabel productperleverancier
        $producten = DB::table('productperleverancier')
            ->join('products', 'productperleverancier.ProductId', '=', 'products.id')
            ->where('productperleverancier.LeverancierId', $leverancierId)
            ->select(
                'productperleverancier.id as ppid',
                'products.id as product_id',
                'products.naam',
                'products.soortallergie',
                'products.barcode',
                'products.houdbaarheidsdatum',
                'productperleverancier.DatumAangeleverd as DatumAangeleverd',
                'productperleverancier.DatumEerstVolgendeLevering as DatumEerstVolgendeLevering'
            )
            ->get();

        return view('producten.index', compact('leverancier', 'producten'));
    }

    public function edit($ppid)
    {
        // Haal de juiste rij uit de tussenliggende tabel en het product
        $pp = DB::table('productperleverancier')
            ->where('id', $ppid)
            ->first();

        if (!$pp) {
            abort(404);
        }

        $product = DB::table('products')->where('id', $pp->ProductId)->first();

        return view('producten.edit', [
            'ppid' => $ppid,
            'product' => $product,
            'datum_aangeleverd' => $pp->DatumAangeleverd,
            'datum_eerst_volgende_levering' => $pp->DatumEerstVolgendeLevering,
        ]);
    }

    public function update(Request $request, $ppid)
    {
        $request->validate([
            'houdbaarheidsdatum' => 'required|date',
            'datum_aangeleverd' => 'required|date',
            'datum_eerst_volgende_levering' => 'required|date',
        ]);

        $pp = DB::table('productperleverancier')->where('id', $ppid)->first();
        if (!$pp) {
            abort(404);
        }

        $product = DB::table('products')->where('id', $pp->ProductId)->first();
        $oudeDatum = $product->houdbaarheidsdatum;
        $nieuweDatum = $request->houdbaarheidsdatum;

        // Controle: mag max 7 dagen verlengd worden
        $maxToegestaan = false;
        if ($oudeDatum && $nieuweDatum) {
            $verschil = \Carbon\Carbon::parse($oudeDatum)->diffInDays(\Carbon\Carbon::parse($nieuweDatum), false);
            if ($verschil > 7) {
                $maxToegestaan = true;
            }
        }

        if ($maxToegestaan) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'De houdbaarheidsdatum is niet gewijzigd. De houdbaarheidsdatum mag met maximaal 7 dagen worden verlengd');
        }

        // Update houdbaarheidsdatum in products tabel
        DB::table('products')
            ->where('id', $pp->ProductId)
            ->update([
                'houdbaarheidsdatum' => $nieuweDatum,
            ]);

        // Update leverdata in productperleverancier tabel
        DB::table('productperleverancier')
            ->where('id', $ppid)
            ->update([
                'DatumAangeleverd' => $request->datum_aangeleverd,
                'DatumEerstVolgendeLevering' => $request->datum_eerst_volgende_levering,
            ]);

        // Stuur terug naar het productoverzicht van de leverancier met een succesmelding
        return redirect()
            ->route('producten.index', $pp->LeverancierId)
            ->with('success', 'De houdbaarheidsdatum is gewijzigd');
    }
}
