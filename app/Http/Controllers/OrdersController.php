<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Customers;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrdersController extends Controller
{
    /**
     * Display the sales page with products and customers.
     *
     * @return \Illuminate\View\View
     */
    // public function index()
    // {
    //     $filter = request()->search;

    //     return view('orders.salespage', [
    //         'products' => Inventory::latest()->filter([
    //             'search' => $filter
    //         ])->paginate(9),
    //         'customers' => Customers::all()
    //     ]);
    // }

    /**
     * Store a new order in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
    // Validate the request
    $validator = Validator::make($request->all(), [
        'quantity' => 'required|array',
        'quantity.*' => 'required|integer|min:1',
        'product_name' => 'required|exists:inventories,id',
        // 'delivery_type' => 'required|string|in:delivery,pickup',
        'customer_name' => 'required|exists:customers,id'
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    // Create the order(s)
    foreach ($request->quantity as $productId => $quantity) {
        if ($quantity > 0) {
            Orders::create([
                'quantity' => $quantity,
                'delivery_type' => $request->delivery_type,
                'order_status' => 'pending',
                'product_id' => $productId,
                'customer_id' => $request->customer_name
            ]);
        }
    }

    return redirect()->route('showOrders')->with('success', 'Order(s) created successfully.');
}
    /**
     * Display a listing of the orders.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $orders = Orders::all();
        return view('orders.showorders', ['orders' => $orders]);
    }

    /**
     * Mark an order as received and update product quantity.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function received($id)
    {
        $order = Orders::findOrFail($id);

        if ($order->order_status !== 'received') {
            $product = Inventory::findOrFail($order->product_id);

            $newQuantity = $product->quantity - $order->quantity;

            // Ensure the quantity does not go below zero
            if ($newQuantity < 0) {
                return back()->with('error', 'Insufficient stock to mark the order as received.');
            }

            $product->update(['quantity' => $newQuantity]);
            $order->update(['order_status' => 'received']);
        }

        return redirect()->back()->with('success', 'Order marked as received.');
    }

    /**
     * Cancel an order.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function canceled($id)
    {
        $order = Orders::findOrFail($id);
        $order->update(['order_status' => 'canceled']);

        return redirect()->back()->with('success', 'Order canceled successfully.');
    }
}
