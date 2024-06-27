<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\User;
class CustomerController extends Controller
{
    public function viewRegisterForm()
    {
        // View the registration form
        return view('register');
    }

    public function store()
    {
        // Validate user input
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:7|max:255',
            'mobile_number' => 'required'
        ]);


        // Create user based on validated input
        $customer = Customer::create($attributes);
        $customer->assignRole('customer');
        return redirect('/');
    }

    public function index() {
         return view('customers.customers');
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


}
