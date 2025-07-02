<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leverancier;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index($leverancierId)
    {
        $leverancier = Leverancier::findOrFail($leverancierId);

        // Haal producten op via de tussenliggende tabel productperleverancier
        $producten = \DB::table('productperleverancier')
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
        $pp = \DB::table('productperleverancier')
            ->where('id', $ppid)
            ->first();

        if (!$pp) {
            abort(404);
        }

        $product = \DB::table('products')->where('id', $pp->ProductId)->first();

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
            'naam' => 'required|string',
            'soortallergie' => 'nullable|string',
            'barcode' => 'nullable|string',
            'houdbaarheidsdatum' => 'required|date',
            'datum_aangeleverd' => 'nullable|date',
            'datum_eerst_volgende_levering' => 'nullable|date',
        ]);

        $pp = \DB::table('productperleverancier')->where('id', $ppid)->first();
        if (!$pp) {
            abort(404);
        }

        // Update product
        \DB::table('products')
            ->where('id', $pp->ProductId)
            ->update([
                'naam' => $request->naam,
                'soortallergie' => $request->soortallergie,
                'barcode' => $request->barcode,
                'houdbaarheidsdatum' => $request->houdbaarheidsdatum,
            ]);

        // Update productperleverancier
        \DB::table('productperleverancier')
            ->where('id', $ppid)
            ->update([
                'DatumAangeleverd' => $request->datum_aangeleverd,
                'DatumEerstVolgendeLevering' => $request->datum_eerst_volgende_levering,
            ]);

        return redirect()
            ->route('producten.edit', $ppid)
            ->with('success', 'Product en leverdata zijn gewijzigd');
    }
}
