<?php

namespace App\Http\Controllers;


use App\Models\Medicine;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;
use App\Http\Requests\Medicine\StoreMedicineRequest;

class MedicinesController extends Controller
{


    public function addMedicine()
    {
        return view("medicines.medicine_add");
    }

    public function storeMedicine(StoreMedicineRequest $request)
    {
        $valid = $request->validated();
        return response()->json(["success" => 1, "msg" => $valid]);
    }
    public function getAutoCompleteData(Request $request)
    {
        $success = 0;
        $medicines = array();
        if ($request->has("term"))
        {
            $medicines = Medicine::where("user_id", "=", Auth::user()->id)->where('name', 'like', '%' . $request->term . "%")->take(10)->get("name");
            if (count($medicines) !== 0)
            {
                $success = 1;
            }
        }
        return response()->json(["success" => $success, "list" => $medicines]);
    }

    public function getAvQty(Request $request)
    {

        $success = 0;
        $qty = Medicine::join("medicines_stocks", "medicines.id", "=", "medicines_stocks.medicine_id")->where("medicines_stocks.user_id", "=", Auth::User()->id)->where("name", "=", $request->medicine)->where("exp", "=", $request->exp)->first();
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
    public function getMedPrice(Request $request)
    {
        $success = 0;
        $price = 0;




        $price = Medicine::where("user_id", "=", Auth::User()->id)->where("name", "=", $request->medicine)->select("price", "strip_price")->get()->first();

        if ($price !== null)
        {
            $success = 1;
        }

        return response()->json(["success" => $success, "price" => $price]);
    }
}
