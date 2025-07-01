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
        $producten = DB::table('productperleverancier')
            ->join('product', 'productperleverancier.ProductId', '=', 'product.id')
            ->where('productperleverancier.LeverancierId', $leverancierId)
            ->select(
                'product.id',
                'product.naam',
                'product.soortallergie',
                'product.barcode',
                'product.houdbaarheidsdatum',
                'productperleverancier.DatumAangeleverd',
                'productperleverancier.DatumEerstVolgendeLevering'
            )
            ->get();

        return view('producten.index', compact('leverancier', 'producten'));
    }

    public function edit($productId)
    {
        $product = DB::table('product')->where('id', $productId)->first();
        return view('producten.edit', compact('product'));
    }

    public function update(Request $request, $productId)
    {
        $request->validate([
            'houdbaarheidsdatum' => 'required|date',
        ]);

        DB::table('product')
            ->where('id', $productId)
            ->update(['houdbaarheidsdatum' => $request->houdbaarheidsdatum]);

        return redirect()
            ->route('producten.edit', $productId)
            ->with('success', 'De houdbaarheidsdatum is gewijzigd');
    }
}
