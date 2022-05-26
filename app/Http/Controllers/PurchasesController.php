<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Http\Requests\Purchase\StorePurchaseRequest;
use App\Models\Medicine;
use App\Models\Payment;
use App\Models\Stock;
use Illuminate\Support\Facades\DB;
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
    public function search(Request $request)
    {
        $query = Purchase::where("user_id", Auth::user()->id)->with("supplier", "payment");
        if ($request->filled("id"))
        {
            $query = $query->where("id", $request->id);
        }
        if ($request->filled("from"))
        {
            $query = $query->where("created_at", ">=", $request->from);
        }
        if ($request->filled("to"))
        {
            $query = $query->where("created_at", "<=", $request->to);
        }
        if ($request->filled("supplier"))
        {
            $query = $query->whereRelation("supplier", "like", "%" . $request->supplier . "%");
        }
        $purchases = $query->get();
        return view("sub.purchase_table", compact("purchases"))->render();
    }
    public function getPurchaseItems($id)
    {

        $purchase =  Purchase::find($id);
        $items =  Purchase::find($id)->purchaseItems;
        $payment =  Purchase::find($id)->payment;
        $supplier =  Purchase::find($id)->supplier;
        return view("sub/purchase_items", compact("purchase", "payment", "supplier", "items"))->render();
    }
    public function store(StorePurchaseRequest $request)
    {

        $validated = $request->validated();
        $supplier = Supplier::where("user_id", Auth::user()->id)->where("name", $validated['supplier'])->first();
        $payment = Payment::create([
            'provider' => $validated['provider'],
            'status' => $validated['status'],
            'created_at' => $validated['date'],
        ]);
        $purchase = Purchase::create([
            'user_id' => Auth::user()->id,
            'total' => $validated['total'],
            'created_at' => $validated['date'],
            'supplier_id' => $supplier->id,
            'payment_id' => $payment->id,
        ]);

        foreach ($request->items as $item)
        {
            $medicine = Medicine::where("user_id", Auth::user()->id)->where("name", $item['medicine'])->get()->first();
            $medicine->update([
                "price" => $item["price"],
            ]);
            $purchase->purchaseItems()->create([
                'unit_price' => $item['supplierPrice'],
                'mfd' => $item['mfd'],
                'exp' => $item['exp'],
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
