<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Http\Requests\Purchase\StorePurchaseRequest;
use App\Models\Medicine;
use App\Models\Payment;
use App\Models\Stock;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PurchasesController extends Controller
{
    public function add()
    {
        $purchase_number = Purchase::max('id') + 1;
        return view("purchases.purchase_add", compact("purchase_number"));
    }
    public function store(StorePurchaseRequest $request)
    {

        $validated = $request->validated();
        $supplier = Supplier::where("user_id", Auth::user()->id)->where("name", $validated['supplier'])->first();

        $purchase = Purchase::create([
            'user_id' => Auth::user()->id,
            'total' => $validated['total'],
            'created_at' => $validated['date'],
            'supplier_id' => $supplier->id,
        ]);
        $purchase->payment()->create([
            'provider' => $validated['provider'],
            'status' => $validated['status'],
            'created_at' => $validated['date'],
        ]);
        foreach ($request->items as $item)
        {
            $medicine = Medicine::where("user_id", Auth::user()->id)->where("name", $item['medicine'])->get()->first();
            $purchase->purchaseItems()->create([
                'unit_price' => $item['price'],
                'medicine_id' => $medicine->id,
                'qty' => $item['qty'],
            ]);
            $stock = Stock::create(['user_id' => Auth::user()->id, 'medicine_id' => $medicine->id, 'supplier_id' => $supplier->id, "mfd" => $item['mfd'], "exp" => $item['exp'], 'qty' => $item['qty']]);
        }
        return response()->json(['success' => true, 'instance' => $purchase]);
    }
    public function manage()
    {
        return view("purchases.purchase_manage");
    }
}
