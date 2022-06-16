<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use App\Http\Requests\Voucher\StoreVoucherRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Safe;
use App\Models\Chest;

class VouchersController extends Controller
{
    public function addVoucher()
    {
        //$invoice_number = Invoice::max('id') + 1;
        return view("vouchers/voucher_add" /*, compact("invoice_number")*/);
    }

    public function manageVoucher()
    {
        return view("vouchers/voucher_manage");
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
    public function store(StoreVoucherRequest $request)
    {
        foreach ($request["vouchers"] as $voucher)
        {
            $chest = Chest::where("user_id", Auth::user()->id)->first();
            $safe = Safe::where("user_id", Auth::user()->id)->first();

            if ($voucher["type"] == "Payment")
            {
                $safe->increment("total", $voucher["amount"]);
                $chest->decrement("total", $voucher["amount"]);
            }
            else if ($voucher["type"] == "Receipt")
            {
                $chest->increment("total", $voucher["amount"]);
                $safe->decrement("total", $voucher["amount"]);
            }

            Voucher::create($voucher + ["user_id" => Auth::user()->id]);
        }
        return response()->json(["success" => 1]);
    }
}
