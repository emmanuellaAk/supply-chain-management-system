<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Orders;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

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
        return view('orders.customers');
    }

    public function store(Request $request)
    {
        // dd('here');
       request()->validate([
        'customer_name'=>'required',
        'location'=>'required',
        'password'=>'required',
        'mobile_number'=>'required'
       ]);

       $hashedPassword = Hash::make($request->password);

        Customers::create([
        'customer_name'=>$request->customer_name,
        'location'=>$request->location,
        'mobile_number'=>$request->mobile_number,
        'password'=>$hashedPassword
       ]);

       return redirect()->route('salesPoint');
    }

    public function edit(Customers $customer) {
        return view('orders.customers-form', ['customer'=>$customer]);
    }

    public function update(Request $request, Customers $customer){
        $validation = Validator::make($request->all(), [
            'customer_name'=> 'required',
            'location'=>'required'
        ]);

        if ($validation->fails()){
            return back()->with('error',"Validation Failed");
        }

        $attributes = ([
            'customer_name'=> $request->customer_name,
            'location'=>$request->location
        ]);
         
        $customer->update($attributes);
        return redirect('customersPage');
    }

    public function destroy(Customers $customer) {
         $customer->delete();

         return redirect()->route('deleteCustomer');
    
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
