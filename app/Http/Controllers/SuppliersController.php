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
        $supplier = Supplier::create($validated + ["user_id" => Auth::user()->id]);
        return response()->json(["instance" => $supplier], 201);
    }

    public function add()
    {
        return view("/suppliers.supplier-add");
    }

    public function search(Request $request)
    {

        $query = Supplier::where("user_id", Auth::user()->id);
        if ($request->filled("name"))
        {

            $query = $query->where("name", "like", $request->name . "%");
        }
        $query->orderBy("name", "asc")->get();
        $suppliers = $query->simplePaginate(5);

        return view("sub.supplier_table", compact("suppliers"))->render();
    }

    public function manage()
    {
        return view("suppliers.supplier-manage");
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
        return response()->json(["instance" => $supplier], 200);
    }
    public function destroy(Request $request)
    {
        if ($request->filled("id"))
        {

            Supplier::destroy($request->id);
        }
        return response()->json(["success" => 1], 200);
    }
}
