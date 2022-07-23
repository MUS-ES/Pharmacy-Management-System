<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use App\Http\Requests\Voucher\StoreVoucherRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Safe;
use App\Models\Chest;
use App\Http\Controllers\Interfaces\ViewMethods;
use Barryvdh\DomPDF\Facade\Pdf;

class VouchersController extends Controller implements ViewMethods
{
    public function add()
    {
        $voucher_number = Voucher::max('id') + 1;
        return view("vouchers/voucher_add", compact("voucher_number"));
    }

    public function manage()
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
        if ($request->filled("type"))
        {
            $type = ucfirst(strtolower($request->type));
            $query = $query->where("type", "like", $type . "%");
        }
        if ($request->filled("from"))
        {
            $query = $query->where("date", ">=", $request->from);
        }
        if ($request->filled("to"))
        {
            $query = $query->where("date", "<=", $request->to);
        }
        $query->orderBy("created_at", "desc")->get();
        $vouchers = $query->simplePaginate(8);

        return view("sub.vouchers_table", compact("vouchers"))->render();
    }
    public function generatePDF(Request $request)
    {
        $vouchers = Voucher::where("user_id", Auth::user()->id);
        if ($request->filled("id"))
        {
            $vouchers = $vouchers->where("id", $request->id);
        }
        if ($request->filled("type"))
        {
            $type = ucfirst(strtolower($request->type));
            $vouchers = $vouchers->where("type", "like", $type . "%");
        }
        if ($request->filled("from"))
        {
            $vouchers = $vouchers->where("date", ">=", $request->from);
        }
        if ($request->filled("to"))
        {
            $vouchers = $vouchers->where("date", "<=", $request->to);
        }
        $vouchers =  $vouchers->orderBy("created_at", "desc")->get();

        $pdf = PDF::loadView("pdf.vouchers", compact("vouchers"));
        return $pdf->download('vouchers.pdf');
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
            else
            {
                $safe->increment("total", $voucher["amount"]);
            }

            Voucher::create($voucher + ["user_id" => Auth::user()->id]);
        }
        return response()->json(["success" => 1], 201);
    }
    public function destroy(Request $request)
    {

        if ($request->filled("id"))
        {
            Voucher::destroy($request->id);
        }
        if ($request->ajax())
            return response()->json(["success" => 1], 200);

        return redirect()->back()->withInput();
    }
}
