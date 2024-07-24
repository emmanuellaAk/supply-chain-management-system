<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function viewRegisterForm()
    {
        // View the registration form
        return view('auth.customer.register');
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

         Customer::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'mobile_number'=>$request->mobile_number,
        'password'=>Hash::make($request->password)
       ]);

        return redirect()->route('customer.login');
    }

    public function viewCustomers() {
        $filter = request()->search;

        return view('customers.current', [
            'customers' => Customer::latest()->filter([
                'search' => $filter
            ])->paginate(10)
        ]);
    }

    public function editProfile() {

        $customerId = session('customer_id'); // Retrieve the customer ID from the session
        $customer = Customer::findOrFail($customerId); // Fetch the customer data from the database
        return view('userinfo', compact('customer'));
    }

    // CustomerController.php
    public function updateProfile(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email',
            'mobile_number' => 'nullable',
            'password' => 'nullable|min:7|max:255', // Validate if present
        ]);

        // Find the customer by ID
        $customer = Customer::findOrFail($request->id);

        // Check if password is provided and not empty
        if ($request->filled('password')) {
            // Hash the password before updating
            $validatedData['password'] = bcrypt($request->password);
        } else {
            // Remove the password field if not provided
            unset($validatedData['password']);
        }

        // Update only the provided fields
        $customer->update(array_filter($validatedData));

        // Redirect back with success message
        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }


// CustomerController.php

public function showProfile()
{
    // Retrieve the customer ID from the session
    $customerId = session('customer_id');

    // Fetch the customer from the database
    $customer = Customer::findOrFail($customerId);

    // Pass the customer data to the view
    return view('customers.profile', ['customer' => $customer]);
}




    // public function editProfile($id)
    // {
    //     // Retrieve the customer by ID
    //     $customer = Customer::findOrFail($id);

    //     // Pass the customer data to the view
    //     return view('userinfo', ['customer' => $customer]);
    // }


//    public function updateProfile(Request $request)
//    {
//     // Validate input
//     $request->validate([
//         'name' => 'required|max:255',
//         'email' => 'required|email|max:255|unique:users,email,' . auth()->id(),
//         'mobile_number' => 'required',
//         'password' => 'nullable|min:7|max:255'
//     ]);

//     // Get the authenticated user
//     // $customer = auth()->user();
//     $customer = session('customer_id');

//     // Update user information
//     $customer->name = $request->name;
//     $customer->email = $request->email;
//     $customer->mobile_number = $request->mobile_number;

//     // Update password if provided
//     if ($request->filled('password')) {
//         $customer->password = Hash::make($request->password);
//     }

//     $customer->update();

//     return redirect()->route('/')->with('success', 'Profile updated successfully.');
// }

// public function updateProfile(Request $request, $id)
// {
//     // Validate input
//     $request->validate([
//         'name' => 'required|max:255',
//         'email' => 'required|email|max:255|unique:customers,email,' . $id,
//         'mobile_number' => 'required',
//         'password' => 'nullable|min:7|max:255'
//     ]);

//     // Retrieve the customer by ID
//     $customer = Customer::findOrFail($id);

//     // Update user information
//     $customer->name = $request->name;
//     $customer->email = $request->email;
//     $customer->mobile_number = $request->mobile_number;

//     // Update password if provided
//     if ($request->filled('password')) {
//         $customer->password = Hash::make($request->password);
//     }

//     // Save the updated customer information
//     $customer->save();

//     return redirect()->route('edit-profile', $customer->id)->with('success', 'Profile updated successfully.');
// }



}
