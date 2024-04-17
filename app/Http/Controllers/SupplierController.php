<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function create()
    {
        return view('supplier-form');
    }

    public function store()
    {
        $attributes = request()->validate([
            'other_names' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|max:255|unique:suppliers,email',
            'mobile_number' => 'required'
        ]);

        Supplier::create($attributes);

        return redirect()->route('supplier');
    }
}
