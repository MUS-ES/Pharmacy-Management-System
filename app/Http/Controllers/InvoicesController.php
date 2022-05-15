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
    public function manageInvoices($to = "", $from = "")
    {
        $invoices = [];
        if ($to == "" && $from == "")
        {

            $invoices = Invoice::select("invoices.id as number", "total", "total_discount", "total_net", "paid", "customers.name as customer", "invoices.created_at  as invoice_date")->where("invoices.user_id", Auth::user()->id)->leftjoin("customers", "customer_id", "=", "customers.id")->orderBy('invoice_date', 'DESC')->get();
        }
        else if ($from == "" && $to != "")
        {

            $invoices = Invoice::select("invoices.id as number", "total", "total_discount", "total_net", "paid", "customers.name as customer", "invoices.created_at  as invoice_date")->where("invoices.user_id", Auth::user()->id)->leftjoin("customers", "customer_id", "=", "customers.id")->where("invoices.created_at", "<=", $to)->orderBy('invoice_date', 'DESC')->get();
        }
        else if ($from != "" && $to == "")
        {

            $invoices = Invoice::select("invoices.id as number", "total", "total_discount", "total_net", "paid", "customers.name as customer", "invoices.created_at  as invoice_date")->where("invoices.user_id", Auth::user()->id)->leftjoin("customers", "customer_id", "=", "customers.id")->where("invoices.created_at", ">=", $from)->orderBy('invoice_date', 'DESC')->get();
        }
        else if ($from != "" && $to != "")
        {

            $invoices = Invoice::select("invoices.id as number", "total", "total_discount", "total_net", "paid", "customers.name as customer", "invoices.created_at  as invoice_date")->where("invoices.user_id", Auth::user()->id)->leftjoin("customers", "customer_id", "=", "customers.id")->where("invoices.created_at", ">=", $from)->where("invoices.created_at", "<=", $to)->orderBy('invoice_date', 'DESC')->get();
        }

        return view("invoices/invoices-manage", compact("invoices", "to", "from"));
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
                Stock::where("user_id", Auth::user()->id)->find($medicine->id)->decrement('qty', $item['qty']);
                $invoiceItem->save();
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
    public function destroy($id)
    {
        Invoice::find($id)->delete();
        return  $this->manageInvoices();
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
