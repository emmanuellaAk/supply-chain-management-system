<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Customers;
use App\Models\Inventory;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    // public function index () {
    // $products = Inventory::all();
    // return view('orders.orderspage', ['products'=> $products]);
    // }

    public function index()
    {
        // $products = Inventory::all();
        $filter = request()->search;

        return view('orders.salespage', [
            'products' => Inventory::latest()->filter([
                'search' => $filter
            ])->paginate(9),
            'customers'=>Customers::all()
        ]);
    }

    public function store(Request $request)
    {
        dd($request);
        // Validate the request
        $request->validate([
            'quantity' => 'required',
            'delivery_type' => 'required',
        ]);

        Orders::create([
            'quantity' => $request->quantity,
            'delivery_type' => $request->delivery_type,
            'order_status' => 'pending',
            'product_id' => $request->product_id,
        ]);

        return redirect()->route('showOrders');
    }
    // }

    //  public function store(Request $request)
    // {

    //     $request->validate([
    //         'product' => 'required|exists:inventories,id',
    //         'quantity' => 'required|integer|min:1',
    //     ]);


    //    PurchaseOrder::create([
    //         'product_id' => $request->input('product'),
    //         'quantity' => $request->input('quantity'),
    //         'order_status' => 'pending',
    //     ]);

    //     return redirect()->route('all-purchases');
    // }

    public function show()
    {
        $orders = Orders::all();
        return view('orders.showorders', ['orders' => $orders]);
        // $filter = request()->search;

        // return view('orders.showorders', [
        //     'customers' => Customers::latest()->filter([
        //         'search' => $filter
        //     ])->paginate(9)
        // ]);
    }

    public function received($id)
    {
        $order = Orders::findorfail($id);
        if ($order->order_status !== 'received') {
            $product = Inventory::findorfail($order->product_id);

            $currentQuantity = $product->quantity;

            $newQuantity = $currentQuantity - $order->quantity;

            $product->update(['quantity' => $newQuantity]);
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

