<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Supplier;
use Illuminate\Http\Request;
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
    public function modify(Request $request)
    {
        $supplier = null;
        if ($request->filled("id"))
        {
            $supplier = supplier::where("user_id", Auth::user()->id)->find($request->id);
            if ($request->filled("name"))
            {
                $supplier->name = $request['name'];
            }
            if ($request->filled("email"))
            {
                $supplier->email = $request['email'];
            }
            if ($request->filled("contact"))
            {
                $supplier->contact = $request['contact'];
            }
            if ($request->filled("address"))
            {
                $supplier->address = $request['address'];
            }
        }
        return response()->json(["success" => 1, "instance" => $supplier]);
    }
    public function destroy(Request $request)
    {
        if ($request->filled("id"))
        {

            Supplier::destroy($request->id);
        }
        return response()->json(["success" => 1]);
    }
}
