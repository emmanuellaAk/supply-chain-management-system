<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\CartItem;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class CartController extends Controller
{
    public function viewProducts()
    {
        $products = Inventory::all();
        return view('customers.productArea', ['products' => $products]);
    }

    public function addCart(Request $request)
    {
        try {
            $validated = $request->validate([
                'product_ids' => 'required|array',
                'product_ids.*' => 'exists:inventories,id',
                'quantities' => 'required|array',
                'quantities.*' => 'integer|min:1',
            ]);

            $customerId = session('customer_id');

            foreach ($validated['product_ids'] as $productId) {
                $quantity = $validated['quantities'][$productId];
                $product = Inventory::find($productId);

                if ($product) {
                    $sellingPrice = $product->selling_price;
                    $totalCost = $quantity * $sellingPrice;

                    Log::info('Saving product to cart', [
                        'customer_id' => $customerId,
                        'product_id' => $product->id,
                        'product_name' => $product->product_name,
                        'quantity' => $quantity,
                        'price' => $sellingPrice,
                        'total_cost' => $totalCost,
                    ]);

                    // Create a new cart entry linked to the customer
                    CartItem::create([
                        'customer_id' => $customerId,
                        'product_id' => $product->id,
                        'product_name' => $product->product_name,
                        'quantity' => $quantity,
                        'price' => $sellingPrice,
                        'total_cost' => $totalCost,
                    ]);
                }
            }

            return redirect()->route('viewCart')->with('success', 'Products added to cart successfully!');
        } catch (\Exception $e) {
            Log::error('Error adding products to cart: ' . $e->getMessage());
            return redirect()->route('viewProducts')->with('error', 'Failed to add products to cart!');
        }
    }

    public function viewCart()
    {
        $customerId = session('customer_id');
        $cartItems = CartItem::where('customer_id', $customerId)->get();
        return view('customers.cartView', compact('cartItems'));
    }

    public function updateCart(Request $request, $id)
    {
        $item = CartItem::find($id);

        if (!$item) {
            return redirect()->route('viewCart')->with('error', 'Cart item not found.');
        }

        $validated = $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $item->update([
            'quantity' => $validated['quantity'],
            'total_cost' => $item->price * $validated['quantity'],
        ]);

        return redirect()->route('viewCart')->with('success', 'Cart item updated successfully.');
    }

    public function removeFromCart($id)
    {
        $item = CartItem::find($id);

        if (!$item) {
            return redirect()->route('viewCart')->with('error', 'Cart item not found.');
        }

        $item->delete();
        return redirect()->route('viewCart')->with('success', 'Cart item removed successfully.');
    }

    public function createOrder()
    {
        $customerId = session('customer_id');
        $cartItems = CartItem::where('customer_id', $customerId)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('viewCart')->with('error', 'Your cart is empty!');
        }

        $order = Order::create([
            'customer_id' => $customerId,
            'status' => 'pending',
        ]);

        foreach ($cartItems as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'product_name' => $cartItem->product_name,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->price,
                'total_cost' => $cartItem->total_cost,
            ]);

            // // Optionally, you can clear the cart item after it's added to the order
            // $cartItem->delete();
        }

        return redirect()->route('customer.order.summary', $order->id)->with('success', 'Order created successfully!');
    }

    public function customerOrderSummary()
    {
        $customerId = session('customer_id');
        // dd($customerId);
        // $orders = Order::with('customer')->paginate(10);
        $orders = Order::where('customer_id', $customerId)->with('customer')->paginate(10);
        return view('customers.orderDetails', compact('orders'));
    }

    public function orderSummary()
    {

        // dd($customerId);
        $orders = Order::with('customer')->paginate(10);
        return view('customers.customerOrderDetails', compact('orders'));
    }

    //     public function received(Request $request, $orderId,  $status)
    // {
    //     // $order = Order::findOrFail($orderId);

    //     // $validated = $request->validate([
    //     //     'status' => 'required|in:pending,received,cancelled',
    //     // ]);

    //     // $order->update(['status' => $validated['status']]);

    //     // return redirect()->route('orderSummary', $orderId)->with('success', 'Order status updated successfully!');
    //     $order = Order::findOrFail($orderId);
    //     $order->update(['status' => $status]);
    //     return redirect()->route('orderSummary')->with('success', 'Order status updated successfully!');
    public function orderreceived($id)
    {
        Order::where('id', $id)->update(['status' => "received"]);
        return redirect()->back();
    }

    public function orderdeclined($id)
    {
        Order::where('id', $id)->update([
            'status' => "declined"
        ]);

        return redirect()->back();
    }

    // public function filter(Request $request)
    // {
    //     $filter = Order::where('status', $request->status)->get();
    //     return view('customers.orderDetails', ['orders' => $filter]);
    // }
}
