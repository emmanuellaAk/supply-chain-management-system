<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Supplier;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InventoryController extends Controller
{
    public function index()
    {
        // $products = Inventory::all();
        $filter = request()->search;

        return view('inventory.inventory', [
            'products' => Inventory::latest()->filter([
                'search' => $filter
            ])->paginate(9)
        ]);
    }

    public function create()
    {
        $suppliers = Supplier::all();
       return view('inventory.inventory-form' , ['suppliers'=>$suppliers] );
    }

    public function store(Request $request)
    {
        // return $request->all();
        request()->validate([
            'product_name' => 'required',
            'cost_price' => 'required',
            'selling_price' => 'required',
            'supplier'=>'required'
        ]);

        Inventory::create([
            'product_name' => $request->product_name,
            'cost_price' => $request->cost_price,
            'selling_price' => $request->selling_price,
            'supplier_id'=>$request->supplier
        ]);

        return redirect()->route('inventory');
    }

    public function edit(Inventory $product)
    {
        return view('inventory.edit-inventory', ['product'=> $product]);
    }

    public function update(Request $request, Inventory $product)
    {
           $validation = Validator::make($request->all(),[
               'product_name'=>'required',
               'cost_price'=>'required',
               'selling_price'=>'required',
               'quantity'=>'required'
           ]);

           if($validation->fails()){
            return back()->with('error', "Validation Failed");
           }

           $attributes = ([
            'product_name'=>$request->product_name,
            'cost_price'=>$request->cost_price,
            'selling_price'=>$request->selling_price,
            'quantity'=>$request->quantity
           ]);

           $product->update($attributes);
           return redirect('inventory');
    }

    public function destroy(Inventory $product)
    {
       $product->delete();

       return redirect()->route('inventory');
    }
}
