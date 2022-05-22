<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Customer\StoreCustomerRequest;

class CustomersController extends Controller
{
    public function store(StoreCustomerRequest $request)
    {
        $validated = $request->validated();
        $customer = Customer::create([
            "name" => $validated['name'],
            "contact" => $validated['contact'],
            "address" => $validated['address'],
            "user_id" => Auth::user()->id,
        ]);
        return response()->json(["success" => 1, "instance" => $customer]);
    }
}
