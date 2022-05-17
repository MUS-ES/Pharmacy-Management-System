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

    public function storeStock(Request $request)
    {

        $medicine = Medicine::where("name", $request->medicine)->where('user_id', Auth::user()->id)->get()->first();
        $stock = Stock::create(['user_id' => Auth::user()->id, 'medicine_id' => $medicine->id, "mfd" => $request->mfd, "exp" => $request->exp, 'qty' => $request->qty]);
        if ($request->filled("supplier"))
        {
            $supplier = Supplier::where("name", $request->supplier)->where('user_id', Auth::user()->id);
            $stock->supplier_id = $supplier->id;
        }
        //$stock->save;
        return response()->json(["success" => true, "stock" => $stock]);
    }
    public function manageStock()
    {
        return view("medicines.stock");
    }
    public function searchStock(Request $request)
    {
        $query =  Stock::where("user_id", Auth::user()->id)->with("medicine", "supplier");
        if ($request->filled("expire") && $request->expire == true)
        {
            $query = $query->where("exp", "<=", Carbon::now());
        }
        if ($request->filled("outOfStock") && $request->outOfStock == 1)
        {
            $query = $query->where("qty", "=", 0);
        }
        if ($request->filled("name"))
        {
            $query = $query->whereRelation("medicine", "name", "like", $request->name . "%");
        }
        if ($request->filled("generic"))
        {
            $query = $query->whereRelation("medicine", "generic_name", "like", $request->generic . "%");
        }
        if ($request->filled("supplier"))
        {
            $query = $query->whereRelation("supplier", "name", "like", $request->supplier . "%");
        }

        $stocks = $query->get();
        return view("sub.stock_table", compact("stocks"))->render();
    }
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
