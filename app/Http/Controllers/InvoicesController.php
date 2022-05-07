<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    public function manageInvoices()
    {
        return view("invoices/invoices-manage");
    }
    public function addInvoice()
    {
        return view("invoices/invoice-add");
    }
    public function returnedMedicines()
    {
        return view("invoices/returned-medicines");
    }
}
