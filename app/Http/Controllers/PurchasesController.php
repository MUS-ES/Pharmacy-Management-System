<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Http\Requests\Purchase\StorePurchaseRequest;
use App\Models\Safe;
use App\Models\Chest;
use App\Models\Medicine;
use App\Models\Payment;
use App\Models\Stock;
use App\Models\Supplier;
use App\Models\Voucher;
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
            $query = $query->where("date", ">=", $request->from);
        }
        if ($request->filled("to"))
        {
            $query = $query->where("date", "<=", $request->to);
        }
        if ($request->filled("supplier"))
        {
            $query = $query->whereRelation("supplier", "name", "like", "%" . $request->supplier . "%");
        }
        $purchases = $query->orderBy("created_at", "desc")->get();
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
        $payment = Payment::create($validated);
        $purchase = Purchase::create($validated + ["user_id" => Auth::user()->id, "supplier_id" => $supplier->id, 'payment_id' => $payment->id]);
        foreach ($request->items as $item)
        {
            $medicine = Medicine::where("user_id", Auth::user()->id)->where("name", $item['medicine'])->get()->first();
            $medicine->update([
                "price" => $item["price"],
            ]);
            $purchase->purchaseItems()->create($item + ["medicine_id" => $medicine->id, 'unit_price' => $item['supplierPrice']]);
            $stock = Stock::where("user_id", Auth::user()->id)->whereRelation("medicine", "name", "=", $item['medicine'])->first();
            if ($stock)
            {
                $stock->increment("qty", $item["qty"]);
            }
            else
            {
                $stock = Stock::create($item + ['user_id' => Auth::user()->id, 'medicine_id' => $medicine->id, 'supplier_id' => $supplier->id]);
            }
        }
        //Voucher::create(["user_id" => Auth::user()->id, "date" => $validated["date"], "type" => "Receipt", "amount" => $validated["total"], "description" => "Buy New Drugs (Purchase id : " . $purchase->id . " )"]);
        Chest::where("user_id", Auth::user()->id)->first()->decrement("total", $validated['paid']);

        return response()->json(['instance' => $purchase], 201);
    }
    public function manage()
    {
        return view("purchases.purchase_manage");
    }
    public function destroy(Request $request)
    {
        if ($request->filled("id"))
        {

            Purchase::destroy($request->id);
        }
        return response()->json(["success" => 1]);
    }
}
