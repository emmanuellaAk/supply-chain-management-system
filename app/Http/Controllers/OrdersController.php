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
            ])->paginate(9)
        ]);
    }

    public function show()
    {   $orders = Orders::all();
        return view('orders.showorders', ['orders'=> $orders]);
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
