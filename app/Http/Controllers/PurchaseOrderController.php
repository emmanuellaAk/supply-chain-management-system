<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Models\PurchaseOrder;

class PurchaseOrderController extends Controller
{
    public function index()
    {
        $purchases = PurchaseOrder::paginate(7);
        return view('purchases.all-purchases', compact('purchases'));
    }

    public function create()
    {
        $products = Inventory::all();
        return view('purchases.purchase-order', ['products' => $products]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'product' => 'required|exists:inventories,id',
            'quantity' => 'required|integer|min:1',
        ]);


       PurchaseOrder::create([
            'product_id' => $request->input('product'),
            'quantity' => $request->input('quantity'),
            'order_status' => 'pending',
        ]);

        return redirect()->route('all-purchases');
    }

    public function received($id)
    {
    // $order = PurchaseOrder::findOrFail($id);
        // if ($order->order_status == 'received') {
        
            // $product = Inventory::findOrFail($order->product_id);

            // $currentQuantity = $product->quantity;

            // $newQuantity = $currentQuantity + $order->quantity;

            // $product->update(['quantity' => $newQuantity]);

            PurchaseOrder::where('id' ,$id)->update(['order_status' => "received"]);

            

           return redirect()->back();
        
    }

    public function receive($id){

        PurchaseOrder::where('id', $id)->update([
            'order_status' => "received"
        ]);

           $order = PurchaseOrder::findOrFail($id);
        
            $product = Inventory::findOrFail($order->product_id);

            $currentQuantity = $product->quantity;

            $newQuantity = $currentQuantity + $order->quantity;

            $product->update(['quantity' => $newQuantity]);

            return redirect()->route('all-purchases')->with('Success', 'Successfully updated');
    
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
