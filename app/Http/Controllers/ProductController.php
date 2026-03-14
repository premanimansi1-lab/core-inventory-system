<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
    {
        $query = Product::query();

        if($request->search){
            $query->where('name','like','%'.$request->search.'%')
                ->orWhere('sku','like','%'.$request->search.'%');
        }

        $products = $query->paginate(5);

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:50|unique:products,sku',
            'category' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'stock' => 'required|numeric|min:0'
        ]);

        Product::create([
            'name' => $request->name,
            'sku' => $request->sku,
            'category' => $request->category,
            'unit' => $request->unit,
            'stock' => $request->stock
        ]);

        return redirect()->route('products.index')
            ->with('success','Product added successfully');
    }

    public function lowStock()
    {
        $products = Product::where('stock','<',5)->get();

        return view('products.lowstock', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $product->update([
            'name' => $request->name,
            'sku' => $request->sku,
            'category' => $request->category,
            'unit' => $request->unit,
            'stock' => $request->stock
        ]);

        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();

         return redirect()->route('products.index');
    }
}
