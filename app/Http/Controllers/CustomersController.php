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

    public function add()
    {
        return view("/customers.customer-add");
    }
    public function search(Request $request)
    {

        $query = Customer::where("user_id", Auth::user()->id);
        if ($request->filled("name"))
        {

            $query = $query->where("name", "like", $request->name . "%");
        }
        $customers = $query->get();

        return view("sub.customer_table", compact("customers"))->render();
    }

    public function manage()
    {
        return view("customers.customer-manage");
    }



    public function destroy(Request $request)
    {
        if ($request->filled("id"))
        {

            Customer::find($request->id)->delete();
        }
        return response()->json(["success" => 1]);
    }
}
