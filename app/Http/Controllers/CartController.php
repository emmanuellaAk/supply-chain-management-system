<?php
namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
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
}
