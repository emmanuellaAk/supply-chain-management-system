<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class SessionsController extends Controller
{
    public function create()
    {
        return view('auth.admin.login');
    }


    public function submitLogin(Request $request)
    {
        request()->validate([
            'email' => 'required',
            'password' => 'required'
        ]);



        User::where('email', $request->email)->first();


        if (!auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            throw ValidationException::withMessages([
                'incorrect_login' => 'Your provided credentials could not be verified'
            ]);
        }

        return redirect()->route('dashboard');
    }

    public function customerLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $customer = Customer::where('email', $request->email)->first();
        if (!$customer) {
            return back()->with('incorrect_login', 'Your provided credentials could not be verified');
        }


        if (!Hash::check($request->password, $customer->password)) {
            return back()->with('incorrect_login', 'Your password is wrong');
        }

        session(['customer_id' => $customer->id]);

        return  view('customers.dashboard');
    }

    public function destroy()
    {

        auth()->logout();
        // For User authentication
        session()->forget('customer_id'); // For Customer session
        session()->flush();
        
    }
}
