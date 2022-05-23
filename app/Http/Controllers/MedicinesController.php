<?php

namespace App\Http\Controllers;


use App\Models\Medicine;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;
use App\Http\Requests\Medicine\StoreMedicineRequest;
use App\Models\Stock;
use App\Models\Supplier;
use Carbon\Carbon;
use GuzzleHttp\Promise\Create;

class MedicinesController extends Controller
{


    public function manageMedicine()
    {
        return view("medicines.medicine_manage");
    }
    public function searchMedicines(Request $request)
    {

        $query = Medicine::where("user_id", Auth::user()->id);
        if ($request->filled("name"))
        {

            $query = $query->where("name", "like", $request->name . "%");
        }
        if ($request->filled("generic"))
        {
            $query = $query->where("generic_name", "like", $request->generic . "%");
        }
        $medicines = $query->get();
        //return response()->json(["meid" => $medicines]);
        return view("sub.medicine_table", compact("medicines"))->render();
    }

    public function addMedicine()
    {
        return view("medicines.medicine_add");
    }

    public function storeMedicine(StoreMedicineRequest $request)
    {
        $validated = $request->validated();
        $medicine = Medicine::create([
            "name" => $validated['name'],
            "generic_name" => $validated['generic'],
            "strip_unit" => $validated['strip'],
            "description" => $validated['description'],
            "price" => $validated['price'],
            "user_id" => Auth::user()->id,
        ]);
        return response()->json(["success" => 1, "instance" => $medicine]);
    }


    public function getAvailableQuantity(Request $request)
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

    public function isExist(Request $request)
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


    public function getMedicineExpiryDates(Request $request)
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
    public function getMedicinePrice(Request $request)
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
    public function destroy(Request $request)
    {
        if ($request->filled("id"))
        {

            Medicine::find($request->id)->delete();
        }
        return response()->json(["success" => 1]);
    }
}
