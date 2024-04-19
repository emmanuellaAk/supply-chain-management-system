<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers', compact('suppliers'));
    }

    public function create()
    {
        return view('supplier-form');
    }

    public function store(Request $request)
    {


        $attributes = request()->validate([
            'full_name' => 'required',
            'email' => 'required|email|max:255|unique:suppliers,email',
            'company_name' => 'required',
            'mobile_number' => 'required',
            'location' => 'required'
        ]);

        Supplier::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'company_name' => $request->company_name,
            'mobile_number' => $request->mobile_number,
            'location' => $request->location

        ]);

        return redirect()->route('suppliers');
    }

    public function edit()
    {
        return view('edit-supplier');
    }

    public function update(Request $request) {
        
    }
}
