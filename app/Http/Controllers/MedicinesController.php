<?php

namespace App\Http\Controllers;


use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicinesController extends Controller
{
    public function getAutoCompleteData(Request $request)
    {
        if ($request->has("term"))
        {
            return Medicine::where('name', 'like', '%' . $request->input("term") . "%")->get("name");
        }
    }

    public function getAvQty(Request $request)
    {

        return response()->json(["success" => "1", "qty" => $qty]);
    }
}
