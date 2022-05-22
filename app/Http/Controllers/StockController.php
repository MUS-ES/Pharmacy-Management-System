<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Medicine;
use App\Models\Stock;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Stock\StoreStockRequest;

class StockController extends Controller
{
    public function store(StoreStockRequest $request)
    {
        $validated = $request->validated();
        $medicineId = Medicine::where("name", $validated['medicine'])->where('user_id', Auth::user()->id)->first()->id;
        $supplierId = null;
        if ($validated["supplier"] != null)
        {
            $supplierId = Supplier::where("name", $validated['supplier'])->where('user_id', Auth::user()->id)->first()->id;
        }
        $stock = Stock::create(['user_id' => Auth::user()->id, 'medicine_id' => $medicineId, 'supplier_id' => $supplierId, "mfd" => $validated['mfd'], "exp" => $validated['exp'], 'qty' => $validated['qty']]);
        return response()->json(["success" => true, "instance" => $stock]);
    }
    public function manage()
    {
        return view("medicines.stock");
    }
    public function search(Request $request)
    {
        $query =  Stock::where("user_id", Auth::user()->id)->with("medicine", "supplier");
        if ($request->filled("expire") && $request->expire == true)
        {
            $query = $query->where("exp", "<=", now());
        }
        if ($request->filled("outOfStock") && $request->outOfStock == 1)
        {
            $query = $query->where("qty", "=", 0);
        }
        if ($request->filled("name"))
        {
            $query = $query->whereRelation("medicine", "name", "like", $request->name . "%");
        }
        if ($request->filled("generic"))
        {
            $query = $query->whereRelation("medicine", "generic_name", "like", $request->generic . "%");
        }
        if ($request->filled("supplier"))
        {
            $query = $query->whereRelation("supplier", "name", "like", $request->supplier . "%");
        }

        $stocks = $query->get();
        return view("sub.stock_table", compact("stocks"))->render();
    }
}
