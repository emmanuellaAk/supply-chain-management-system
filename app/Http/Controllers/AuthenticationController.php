<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller



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
            'password' => 'required|min:7|max:255'
        ]);

        // Create user based on validated input
        User::create($attributes);

        return redirect('login');
    }
}



// {
//     // 1. register function
//    public function register(Request $request)
//    {
//      //name
//      //email
//      //password
//      //checking validation for user's input
//      $this->validate($request,
//      [
//        'name'=>'required|string',
//        'email'=>'required|email',
//        'password'=>'required|min:7'
//     ],
//     [
//        'name.required'=>'A name is required'
//     ]);

//     User::create(
//     [
//       'name'=> $request->name,
//       'email'=> $request->email,
//       'password'=> Hash::make($request->password)
//     ]
//    );

//     return 'saved successfully';
//     }

//     public function viewRegisterForm()
//     {
//        return view('register');
//     }


//     // 2.Login function
//     // 3.reset password function
// }
