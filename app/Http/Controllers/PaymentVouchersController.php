<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentVouchersController extends Controller
{
    public function addPaymentVoucher()
    {
        //$invoice_number = Invoice::max('id') + 1;
        return view("payment-vouchers/payment-vouchers-add" /*, compact("invoice_number")*/);
    }

    public function managePaymentVoucher()
    {
        return view("payment-vouchers/payment-vouchers-manage");
    }
    public function search(Request $request)
    {

        $query = Voucher::where("user_id", Auth::user()->id);
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
        $vouchers = $query->get();
        return view("sub.vouchers_table", compact("vouchers"))->render();
    }
}
