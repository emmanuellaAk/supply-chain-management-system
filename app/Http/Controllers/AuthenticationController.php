<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
            'password' => 'required|min:7|max:255',
            'company_name' => 'required',
            'mobile_number' => 'required'

        ]);

        // Create user based on validated input
        User::create($attributes);

        return redirect('/');
    }

    public function edit(User $user)
    {
        return view('userinfo',['user'=> $user] );
    }

    public function update(Request $request, User $user)
    {
       $validation = Validator::make($request->all(), [
        'name'=>'required',
        'company'=>'required',
        'email'=>'required',
        'mobile_number'=>'required',
       ]);

       if ($validation->fails()){
        return back()->with('error',"Validation Failed");
       }

       $attributes = ([
        'name'=>$request->name,
        'company'=>$request->company,
        'email'=>$request->email,
        'mobile_number'=>$request->mobile_number,
       ]);

      $user->update($attributes);
      return redirect('/');
    }
}


