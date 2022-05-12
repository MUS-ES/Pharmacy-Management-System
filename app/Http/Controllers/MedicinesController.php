<?php

namespace App\Http\Controllers;


use App\Models\Medicine;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

class MedicinesController extends Controller
{
    public function getAutoCompleteData(Request $request)
    {
        $success = 0;
        if ($request->has("term"))
        {
            $medicines = Medicine::where("user_id", "=", Auth::user()->id)->where('name', 'like', '%' . $request->input("term") . "%")->get("name");
            if ($medicines !== null)
            {
                $success = 1;
            }
        }
        return response()->json(["success" => $success, "list" => $medicines]);
    }

    public function getAvQty(Request $request)
    {

        $success = 0;
        $qty = Medicine::join("medicines_stocks", "medicines.id", "=", "medicines_stocks.medicine_id")->where("medicines_stocks.user_id", "=", Auth::User()->id)->where("name", "=", $request->medicine)->first();
        if ($qty !== null)
        {
            $success = 1;
            $qty = $qty->qty;
        }
        return response()->json(["success" => $success, "qty" => $qty]);
    }

    public function isMedExist(Request $request)
    {
        $exist = 0;
        if ($request->has("medicine"))
        {

            $exist = Medicine::join("medicines_stocks", "medicines.id", "=", "medicines_stocks.medicine_id")->where("medicines_stocks.user_id", "=", Auth::User()->id)->where("name", "=", $request->medicine)->count();
            if ($exist !== 0)
            {
                $exist = 1;
            }
        }
        return response()->json(["exist" => $exist]);
    }


    public function getMedExpDates(Request $request)
    {
        {
            $success = 0;
            if ($request->has("medicine"))
            {

                $exp_dates = Medicine::join("medicines_stocks", "medicines.id", "=", "medicines_stocks.medicine_id")->where("medicines_stocks.user_id", "=", Auth::User()->id)->where("name", "=", $request->medicine)->get("exp")->unique("exp");
                if ($exp_dates != null)
                {
                    $success = 1;
                }
            }
            return response()->json(["success" => $success, "expDates" => $exp_dates]);
        }
    }
}
