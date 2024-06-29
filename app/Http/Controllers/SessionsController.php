<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions');
    }

    public function submitLogin(Request $request)
    {
        request()->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();
        //     $password = 'emma1234';
        //     $user->password = bcrypt($password ) ;
        //     $user->save();
        //    $password;
        //     dd( $user, $request->all());

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
        // dd($request->password, $customer->password);

        if(!Hash::check($request->password, $customer->password) ) {
                return back()->with('incorrect_login', 'Your password is wrong');
        }
        // if(!auth()->attempt(['email'=>$request->email , 'password' => $request->password])){
        //         throw ValidationException::withMessages([
        //         'incorrect_login' => 'Your provided credentials could not be verified'
        //     ]);
        // }

        // dd($request->all());

        return  view('customers.dashboard');
    }

    public function destroy()
    {

        auth()->logout();

        return redirect('/');
    }
}


        //$credentials = $request->only('email', 'password');

        // if (Auth::guard('customer')->attempt($credentials)) {
        //     return redirect()->route('salesPoint');
        // }

        // // Attempt to log in the manager if customer login fails
        // if (Auth::guard('web')->attempt($credentials)) {
        //     return redirect()->route('dashboard');
        // }


        // return 123;

        // if (auth()->attempt($attributes)) {

        //     //if authentication failed
        //     throw ValidationException::withMessages([
        //         'email' => 'Your provided credentials could not be verified'
        //     ]);
        // }


        // session()->regenerate();

        // return 123;

        // return redirect()->route('dashboard');
