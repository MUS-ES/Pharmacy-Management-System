<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Http\Requests\Supplier\StoreSupplierRequest;

class SuppliersController extends Controller
{
    public function store(StoreSupplierRequest $request)
    {
        $validated = $request->validated();
        $supplier = Supplier::create([
            "name" => $validated['name'],
            "email" => $validated['email'],
            "contact" => $validated['contact'],
            "address" => $validated['address'],
            "user_id" => Auth::user()->id,
        ]);
        return response()->json(["success" => 1, "instance" => $supplier]);
    }
}
