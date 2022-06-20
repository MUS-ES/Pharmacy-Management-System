<?php

namespace App\Http\Controllers;


use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Medicine\StoreMedicineRequest;
use Faker\Provider\Medical;

class MedicinesController extends Controller
{

    public function create()
    {
        return view("medicines.medicine_add");
    }

    public function manage()
    {
        return view("medicines.medicine_manage");
    }
    public function search(Request $request)
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
        $medicines = $query->orderBy("name", "asc")->get();
        //return response()->json(["meid" => $medicines]);
        return view("sub.medicine_table", compact("medicines"))->render();
    }

    public function all()
    {
        $medicines = Medicine::all();
        return response()->json(["success" => true, "data" => $medicines]);
    }
    public function store(StoreMedicineRequest $request)
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
        return response()->json(['success' => true, "exist" => $exist]);
    }

    public function modify(Request $request)
    {
        $medicine = null;
        if ($request->filled("id"))
        {
            $medicine = Medicine::where("user_id", Auth::user()->id)->find($request->id);
            if ($request->filled("name"))
            {
                $medicine->name = $request['name'];
            }
            if ($request->filled("generic"))
            {
                $medicine->generic_name = $request['generic'];
            }
            if ($request->filled("price"))
            {
                $medicine->price = $request['price'];
            }
            if ($request->filled("strip"))
            {
                $medicine->strip = $request['strip'];
            }
            if ($request->filled("description"))
            {
                $medicine->description = $request['description'];
            }
        }
        return response()->json(["success" => 1, "instance" => $medicine]);
    }


    public function show(Request $request)
    {
        $medicine = null;
        if ($request->filled("id"))
        {
            $medicine = Medicine::where("user_id", Auth::user()->id)->where("id", $request->id)->first();
        }
        if ($request->filled("medicine"))
        {
            $medicine = Medicine::where("user_id", Auth::user()->id)->where("name", "=", $request->medicine)->first();
        }
        return response()->json(["success" => 1, "instance" => $medicine]);
    }
    public function destroy(Request $request)
    {
        if ($request->filled("id"))
        {

            Medicine::destroy($request->id);
        }
        return response()->json(["success" => 1]);
    }
}
