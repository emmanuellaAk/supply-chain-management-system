<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(){
       return view('suppliers');
    }

    public function create()
    {
        return view('supplier-form');
    }

    public function store()
    {
        $attributes = request()->validate([
            'fullname' => 'required',
            'email' => 'required|email|max:255|unique:suppliers,email',
            'companyname'=>'required',
            'mobile_number' => 'required',
            'location'=>'required'
        ]);

        Supplier::create($attributes);

        return redirect()->route('suppliers');
    }
}
