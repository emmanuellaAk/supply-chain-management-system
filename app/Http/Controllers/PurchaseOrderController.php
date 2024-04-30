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
        // Validate the incoming request data
        $request->validate([
            'product' => 'required|exists:inventories,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Create a new purchase order
        $purchase = PurchaseOrder::create([
            'product_id' => $request->input('product'),
            'quantity' => $request->input('quantity'),
            'order_status' => 'pending',
        ]);

        return redirect()->route('all-purchases');
    }

    public function received($id)
    {
        $order = PurchaseOrder::findOrFail($id);
        if ($order->order_status !== 'received') {
            // Retrieve the product based on the provided ID
            $product = Inventory::findOrFail($order->product_id);

            // Get the current quantity of the product
            $currentQuantity = $product->quantity;

            // Add the ordered quantity to the current quantity
            $newQuantity = $currentQuantity + $order->quantity;

            // Update the quantity of the product
            $product->update(['quantity' => $newQuantity]);
        }

        $order->update(['order_status' => 'received']);

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
        $filter = PurchaseOrder::where('order_status', $request->order_status)->get();
        return view('purchases.all-purchases', ['purchases' => $filter]);
    }
}
