<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
class CustomerController extends Controller
{
    public function viewRegisterForm()
    {
        // View the registration form
        return view('register');
    }

    public function store(Request $request)
    {
        // Validate user input
     request()->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:7|max:255',
            'mobile_number' => 'required'
        ]);

        $customer = Customer::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'mobile_number'=>$request->mobile_number,
        'password'=>Hash::make($request->password)
       ]);

        // Create user based on validated input

        $customer->assignRole('manager');
        return redirect()->route('customer.login');
    }

    public function index() {
         return view('customers.login');
    }

    //     // dd('here');
    //    request()->validate([
    //     'customer_name'=>'required',
    //     'location'=>'required',
    //     'password'=>'required',
    //     'mobile_number'=>'required'
    //    ]);

    //    $hashedPassword = Hash::make($request->password);

    //     Customers::create([
    //     'customer_name'=>$request->customer_name,
    //     'location'=>$request->location,
    //     'mobile_number'=>$request->mobile_number,
    //     'password'=>$hashedPassword
    //    ]);

    public function viewCustomers() {
        // $customers = Customer::all();
        // return view('customers.current', compact('customers'));

        $filter = request()->search;

        return view('customers.current', [
            'customers' => Customer::latest()->filter([
                'search' => $filter
            ])->paginate(10)
        ]);
    }

    public function viewSalesPoint() {
        $filter = request()->search;

        return view('customers.salesPoint', [
            'products' => Inventory::latest()->filter([
                'search' => $filter
            ])->paginate(10)
        ]);
    }
}
