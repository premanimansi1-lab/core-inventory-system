<?php

namespace App\Http\Controllers;

use App\Models\Movement;
use App\Models\Product;
use Illuminate\Http\Request;

class MovementController extends Controller
{
    public function index(Request $request)
    {
        $query = Movement::with('product')->latest();

        if($request->status){
            $query->where('status', $request->status);
        }

        $movements = $query->get();

        return view('movements.index', compact('movements'));
    }

    public function create()
    {
        $products = Product::all();
        return view('movements.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'qty' => 'required|numeric|min:1',
            'type' => 'required'
        ]);

        Movement::create([
            'product_id' => $request->product_id,
            'qty' => $request->qty,
            'type' => $request->type,
            'status' => 'pending'
        ]);

        return redirect()->route('movements.index')
            ->with('success','Movement created and waiting for approval');
    }
   public function approve($id)
    {
        $movement = Movement::findOrFail($id);
        $product = Product::findOrFail($movement->product_id);

        if($movement->type == 'receipt'){
            $product->stock += $movement->qty;
        }

        if($movement->type == 'delivery'){
            if($product->stock < $movement->qty){
                return back()->with('error','Not enough stock');
            }

            $product->stock -= $movement->qty;
        }

        $product->save();

        $movement->status = 'approved';
        $movement->save();

        return back()->with('success','Movement Approved');
    }

    public function destroy(Movement $movement)
    {
        $movement->delete();
        return redirect()->route('movements.index');

    }
}
