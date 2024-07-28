<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Models\PurchaseOrder;

class PurchaseOrderController extends Controller
{
    public function index()
    {
        // Paginate the purchases, 7 per page
        $purchases = PurchaseOrder::paginate(7);
        return view('purchases.all-purchases', compact('purchases'));
    }

    public function create()
    {
        // Retrieve all products from inventory
        $products = Inventory::all();
        return view('purchases.purchase-order', ['products' => $products]);
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'product' => 'required|exists:inventories,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Create a new purchase order
        PurchaseOrder::create([
            'product_id' => $request->input('product'),
            'quantity' => $request->input('quantity'),
            'order_status' => 'pending',
        ]);

        // Redirect to the all purchases page
        return redirect()->route('all-purchases')->with('success', 'Purchase order created successfully.');
    }

    public function receive($id)
    {
        // Find the order or fail
        $order = PurchaseOrder::findOrFail($id);

        // Update the order status to received
        $order->update(['order_status' => "received"]);

        // Update the product quantity in the inventory
        $product = Inventory::findOrFail($order->product_id);
        $currentQuantity = $product->quantity;
        $newQuantity = $currentQuantity + $order->quantity;
        $product->update(['quantity' => $newQuantity]);

        // Redirect with success message
        return redirect()->route('all-purchases')->with('success', 'Order received and inventory updated.');
    }

    public function declined($id)
    {
        // Update the order status to declined
        PurchaseOrder::where('id', $id)->update(['order_status' => "declined"]);

        // Redirect back with a message
        return redirect()->back()->with('success', 'Order declined successfully.');
    }

    public function filter(Request $request)
{
    if ($request->order_status) {
        $filter = PurchaseOrder::where('order_status', $request->order_status)->paginate(7); // Use pagination
    } else {
        $filter = PurchaseOrder::paginate(7); // Retrieve all purchases
    }

    return view('purchases.all-purchases', ['purchases' => $filter]);

}
}
