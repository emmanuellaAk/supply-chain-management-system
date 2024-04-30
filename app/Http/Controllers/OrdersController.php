<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Inventory;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Orders::all();
        return view('orders.order', compact('orders'));
    }

    public function create()
    {
        return view('orders.customer-form');
    }

    public function store(Request $request)
    {
        // dd('here');
       request()->validate([
        'customer_name'=>'required',
        'location'=>'required',
        // 'delivery_type'=>'required',
        // 'order_status'=>'required'
       ]);

       Orders::create([
        'customer_name'=>$request->customer_name,
        'location'=>$request->location,
        'delivery_type'=>'pickup',
        'order_status'=>'pending'
       ]);

       return redirect()->route('orders');
    }

    public function received($id)
    {
      $order = Orders::findorfail($id);
      if ($order->order_status !=='received') {
        $product = Inventory::findorfail($order->product_id);

        $currentQuantity = $product->quantity;

        $newQuantity = $currentQuantity - $order->quantity;

        $product->update(['quantity'=> $newQuantity]);
      }
    }

    public function canceled($id)
    {
        Orders::where('id', $id)->update([
            'order_status' => "canceled"
        ]);

        return redirect()->back();
    }
}
