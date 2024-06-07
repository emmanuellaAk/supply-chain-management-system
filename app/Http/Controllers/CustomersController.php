<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Orders;
use App\Models\Inventory;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index()
    {

        $filter = request()->search;

        return view('orders.order', [
            'customers' =>Customers::latest()->filter([
                'search' => $filter
            ])->paginate(9)
        ]);
        // $customers = Customers::all();
        // return view('orders.order', compact('customers'));
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
       ]);

        Customers::create([
        'customer_name'=>$request->customer_name,
        'location'=>$request->location,
       ]);

       return redirect()->route('customersPage');
    }

    public function received($id)
    {
      Customers::where('id', $id)->update([
            'order_status' => "received"
      ]);
      $order = Customers::findorfail($id);
     
        $product = Inventory::findorfail($order->product_id);

        $currentQuantity = $product->quantity;

        $newQuantity = $currentQuantity - $order->quantity;

        $product->update(['quantity'=> $newQuantity]);

        return redirect()->route('customers')->with('Success', 'Successfully updated');
      
    }

    public function canceled($id)
    {
        Orders::where('id', $id)->update([
            'order_status' => "canceled"
        ]);

        return redirect()->back();
    }
}
