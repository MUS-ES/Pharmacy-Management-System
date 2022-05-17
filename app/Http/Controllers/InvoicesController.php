<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use App\Models\Invoice;
use App\Models\InvoicesItems;
use App\Models\Medicine;
use Exception;
use App\Models\Payment;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
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
            $query = $query->where("created_at", "<=", $request->to);
        }
        if ($request->filled("customer"))
        {
            $query = $query->whereRelation("customer", "like", "%" . $request->customer . "%");
        }
        $invoices = $query->get();
        return view("sub.invoice_table", compact("invoices"))->render();
    }
    public function manageInvoices()
    {

        return view("invoices/invoices-manage");
    }
    public function addInvoice()
    {
        $invoice_number = Invoice::max('id') + 1;
        return view("invoices/invoice-add", compact("invoice_number"));
    }
    public function returnedMedicines()
    {
        return view("invoices/returned-medicines");
    }
    public function store(Request $request)
    {
        $total = 0;
        $customerId = null;
        $medicine = "";
        try
        {

            DB::beginTransaction();
            if ($request->filled("customer"))
                $customerId = Customer::where("user_id", Auth::user()->id)->where("name", $request->customer)->first()->id;

            $payment = new Payment([
                'provider' => $request->paymentType,
                'status' => $request->status,
                'created_at' => $request->invoiceDate,
            ]);
            $payment->save();
            $invoice = new Invoice([
                'user_id' => Auth::user()->id,
                'payment_id' => $payment->id,
                'customer_id' => $customerId,
                'created_at' => $request->invoiceDate,
                'total_discount' => $request->totalDiscount,
                'total_net' => $request->net,
                'paid' => $request->paidAmount,
            ]);
            $invoice->save();

            foreach ($request->items as $item)
            {

                $medicine = Medicine::where("user_id", Auth::user()->id)->where("name", $item['medicine'])->first();
                $invoiceItem = new InvoicesItems([
                    "medicine_id" => $medicine->id,
                    "qty" => $item['qty'],
                    "discount" => $item['discount'],
                    "invoice_id" => $invoice->id,
                ]);

                $invoiceItem->save();
                $handle = Stock::where("user_id", Auth::user()->id)->find($medicine->id);
                //  $handle = Stock::where("user_id", Auth::user()->id)->find($medicine->id)->decrement('qty', $item['qty']);;
                /* if ($handle->qty == $item['qty'])
                {
                    $handle->delete();
                }
                else
                {
                    $handle->decrement('qty', $item['qty']);
                } */
                $total += ($medicine->price * $invoiceItem->qty);
            }

            $invoice->update(['total' => $total]);
            DB::commit();
        }
        catch (Exception $e)
        {
            return response()->json(["Error" => $e->getMessage()]);
        }
        return response()->json(["success" => 1, "invoice" => $invoice]);
    }
    public function destroy(Request $request)
    {
        if ($request->filled("id"))
        {

            Invoice::find($request->id)->delete();
        }
        return response()->json(["success" => 1]);
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
