<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Requests\Supplier\StoreSupplierRequest;
use App\Http\Controllers\Interfaces\ViewMethods;
use Barryvdh\DomPDF\Facade\Pdf;

class SuppliersController extends Controller implements ViewMethods
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
        $suppliers = $query->simplePaginate(8);

        return view("sub.supplier_table", compact("suppliers"))->render();
    }
    public function generatePDF(Request $request)
    {
        $suppliers = Supplier::where("user_id", Auth::user()->id);
        if ($request->filled("name"))
        {

            $suppliers = $suppliers->where("name", "like", $request->name . "%");
        }
        $suppliers = $suppliers->orderBy("name", "asc")->get();

        $pdf = PDF::loadView("pdf.suppliers", compact("suppliers"));
        return $pdf->download('suppliers.pdf');
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
