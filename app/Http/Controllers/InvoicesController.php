<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Invoice;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoicesController extends Controller
{
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
}
