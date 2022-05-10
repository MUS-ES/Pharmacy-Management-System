<?php

namespace App\Http\Controllers;


use App\Models\Medicine;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
}
