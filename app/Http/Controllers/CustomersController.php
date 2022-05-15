<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class CustomersController extends Controller
{
    public function store(Request $request)
    {
        Customer::create(["name" => $request->name, "address" => $request->address, "contact" => $request->contact, "user_id" => Auth::user()->id]);
        return response()->json(["success" => 1]);
    }
}
