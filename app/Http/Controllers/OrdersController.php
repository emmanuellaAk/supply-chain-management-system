<?php

namespace App\Http\Controllers;

use App\Models\Orders;
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
      
    }
}
