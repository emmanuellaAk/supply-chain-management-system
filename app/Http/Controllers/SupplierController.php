<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers.suppliers', compact('suppliers'));
    }

    public function create()
    {
        return view('suppliers.supplier-form');
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

    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit-supplier', ['supplier' => $supplier]);
    }


    public function update(Request $request, Supplier $supplier)
    {
        // return 3456789;

        $validation = Validator::make($request->all(), [
            'full_name' => 'required',
            'company_name' => 'nullable',
            'email' => 'required',
            'mobile_number' => 'required',
            'location' => 'required',
        ]);

        if ($validation->fails()) {
            return back()->with('error', "Validation Failed");
        }

        $attributes = ([
            'full_name' => $request->full_name,
            'company_name' => $request->company_name,
            'email' => $request->email,
            'mobile_number' => $request->mobile_number,
            'location' => $request->location
        ]);

        $supplier->update($attributes);
        return redirect('suppliers');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()->route('suppliers')->with('success', 'Supplier deleted successfully.');
    }

}
