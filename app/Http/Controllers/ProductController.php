<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function catalogue()
    {
        $products = Product::with('category')->latest()->get();
        return view('catalogue.index', compact('products'));
    }

    public function sellerProducts()
    {
        $products = Product::where('vendeur_id', Auth::id())->latest()->get();
        return view('seller.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('seller.products.create', compact('categories'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'nom' => 'required',
            'prix' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required',
            'image' => 'required|filled|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        Product::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'prix' => $request->prix,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
            'vendeur_id' => Auth::id(),
            'image' => $request->file('image')->store('products', 'public'),
        ]);

        return redirect()->route('seller.products');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('seller.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('seller.products');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('seller.products');
    }

    public function ventes()
   {
    $products = Product::where('vendeur_id', auth()->id())
        ->with('orderItems')
        ->get();

    return view('seller.ventes', compact('products'));
   }
}