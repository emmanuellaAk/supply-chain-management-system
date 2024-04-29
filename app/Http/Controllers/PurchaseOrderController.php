<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Models\PurchaseOrder;

class PurchaseOrderController extends Controller
{
    public function index()
    {
        $purchases = PurchaseOrder::paginate(4);
        return view('purchases.all-purchases', compact('purchases'));
    }

    public function create()
    {
        $products = Inventory::all();
        return view('purchases.purchase-order', ['products' => $products]);
    }

    public function store(Request $request)
    {
        $attributes = request()->validate([
            'product' => 'required',
            'quantity' => 'required',
        ]);

        PurchaseOrder::create([
            'product_id' => $request->product,
            'quantity' => $request->quantity,
            'order_status' => 'pending'
        ]);

        return redirect()->route('all-purchases');
    }

    public function received($id)
    {
        PurchaseOrder::where('id', $id)->update([
            'order_status' => "received"
        ]);

        return redirect()->back();
    }

    public function declined($id)
    {
        PurchaseOrder::where('id', $id)->update([
            'order_status' => "declined"
        ]);

        return redirect()->back();
    }

    public function filter(Request $request)
    {
        // return $request->order_status;
        $filter = PurchaseOrder::where([
           'order_status'=> $request->order_status
        ])->get();

        return view('purchases.all-purchases', ['purchases' => $filter ]);


    }
}
