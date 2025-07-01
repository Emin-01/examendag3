<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leverancier;
use App\Models\Product;

class ProductController extends Controller
{
    public function index($leverancierId)
    {
        $leverancier = Leverancier::findOrFail($leverancierId);
        $producten = Product::where('leverancier_id', $leverancierId)->get();

        return view('producten.index', compact('leverancier', 'producten'));
    }

    public function edit(Product $product)
    {
        return view('producten.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'houdbaarheidsdatum' => 'required|date',
        ]);

        $product->houdbaarheidsdatum = $request->houdbaarheidsdatum;
        $product->save();

        return redirect()
            ->route('producten.edit', $product)
            ->with('success', 'De houdbaarheidsdatum is gewijzigd');
    }
}
