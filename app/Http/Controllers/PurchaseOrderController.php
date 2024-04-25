<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Models\PurchaseOrder;

class PurchaseOrderController extends Controller
{
    public function index()
    {
         $purchases = PurchaseOrder::all();
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
        'product'=>'required',
        'quantity'=>'required',
       ]);

       PurchaseOrder::create([
        'product_id'=>$request->product,
        'quantity'=>$request->quantity,
        'order_status' =>'pending'
       ]);

       return redirect()->route('all-purchases');
    }

    public function received()
    {
      
    }

    public function purchaseDeclined()
    {

    }
}
