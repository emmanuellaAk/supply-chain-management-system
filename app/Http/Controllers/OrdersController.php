<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Orders;
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
    {
        return view('orders.showorders');
    }
}
