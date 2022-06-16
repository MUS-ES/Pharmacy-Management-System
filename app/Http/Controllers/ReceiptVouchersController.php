<?php

namespace App\Http\Controllers;

use App\Models\ReceiptVoucher;
use Illuminate\Http\Request;

class ReceiptVouchersController extends Controller
{
    public function addReceiptVoucher()
    {
        // $invoice_number = Invoice::max('id') + 1;
    return view("receipt-vouchers/receipt-vouchers-add" /*, compact("invoice_number")*/);
    }

    public function manageReceiptVoucher()
    {
        return view("receipt-vouchers/receipt-vouchers-manage");
    }
}
