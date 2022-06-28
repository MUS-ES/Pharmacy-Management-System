<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use App\Models\Invoice;
use App\Models\InvoiceItems;
use App\Models\Medicine;
use App\Http\Requests\Invoice\StoreInvoiceRequest;
use App\Models\Chest;
use App\Models\Payment;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoicesController extends Controller
{

    public function searchInvoices(Request $request)
    {
        $query = Invoice::where("user_id", Auth::user()->id)->with("customer", "payment");
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
            $query = $query->where("date", "<=", $request->to);
        }
        if ($request->filled("customer"))
        {
            $query = $query->whereRelation("customer", "name", "like", "%" . $request->customer . "%");
        }
        $invoices = $query->orderBy("date", "desc")->get();
        return view("sub.invoice_table", compact("invoices"))->render();
    }
    public function manageInvoices()
    {

        return view("invoices/invoices_manage");
    }
    public function addInvoice()
    {
        $invoice_number = Invoice::max('id') + 1;
        return view("invoices/invoice_add", compact("invoice_number"));
    }
    public function returnedMedicines()
    {
        return view("invoices/returned_medicines");
    }
    public function store(StoreInvoiceRequest $request)
    {
        $validated = $request->validated();
        $customerId = null;
        if ($request->filled("customer"))
            $customerId = Customer::where("user_id", Auth::user()->id)->where("name", $request->customer)->first()->id;
        $payment = Payment::create($validated);

        $invoice = Invoice::create($validated + [
            'user_id' => Auth::user()->id,
            'payment_id' => $payment->id,
            'customer_id' => $customerId
        ]);

        foreach ($request->items as $item)
        {

            $medicine = Medicine::where("user_id", Auth::user()->id)->where("name", $item['medicine'])->first();
            $invoiceItem = InvoiceItems::create($item + [
                "medicine_id" => $medicine->id,
                "invoice_id" => $invoice->id,
            ]);
            $query = Stock::where("user_id", Auth::user()->id)->where("medicine_id", $medicine->id)->where("exp", $item['exp'])->first();
            if ($query->qty == $item['qty'])
            {
                $query->delete();
            }
            else
            {
                $query->decrement('qty', $item['qty']);
            }
        }
        Chest::where("user_id", Auth::user()->id)->increment("total", (int)$validated["paid"]);

        return response()->json(["invoice" => $invoice, "payment" => $payment], 201);
    }
    public function destroy(Request $request)
    {
        if ($request->filled("id"))
        {

            Invoice::destroy($request->id);
        }
        return response()->json(["success" => 1], 200);
    }

    public function getInvoiceItems($id)
    {

        $invoice =  Invoice::find($id);
        $items =  Invoice::find($id)->invoiceItems;
        $payment =  Invoice::find($id)->payment;
        $customer =  Invoice::find($id)->customer;
        return view("sub/invoice_items", compact("invoice", "payment", "customer", "items"))->render();
    }
}
