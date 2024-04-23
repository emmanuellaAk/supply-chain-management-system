<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\User;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $products = Inventory::all();
        return view('inventory', compact('products'));
    }

    public function create()
    {

        return view('inventory-form');
    }

    public function store(Request $request)
    {
        request()->validate([
            'product_name' => 'required',
            'cost_price' => 'required',
            'selling_price' => 'required',
            'quantity' => 'required',
        ]);

        Inventory::create([
            'product_name' => $request->product_name,
            'cost_price' => $request->cost_price,
            'selling_price' => $request->selling_price,
            'quantity' => $request->quantity

        ]);

        return redirect()->route('inventory');
    }
}
