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
        $customer = Customer::create($validated + [
            "user_id" => Auth::user()->id
        ]);
        return response()->json(["instance" => $customer]);
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
        $customers = $query->orderBy("created_at", "desc")->get();

        return view("sub.customer_table", compact("customers"))->render();
    }

    public function manage()
    {
        return view("customers.customer-manage");
    }

    public function modify(Request $request)
    {
        $customer = null;
        if ($request->filled("id"))
        {
            $customer = customer::where("user_id", Auth::user()->id)->find($request->id);
            if ($request->filled("name"))
            {
                $customer->name = $request['name'];
            }
            if ($request->filled("address"))
            {
                $customer->address = $request['address'];
            }
            if ($request->filled("contact"))
            {
                $customer->contact = $request['contact'];
            }
        }
        return response()->json(["success" => 1, "instance" => $customer], 203);
    }

    public function destroy(Request $request)
    {
        if ($request->filled("id"))
        {

            Customer::destroy($request->id);
        }
        return response()->json(["success" => 1]);
    }
}
