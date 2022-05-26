<?php

namespace App\Http\Controllers;

use App\Http\Requests\Payment\StorePaymentRequest;
use App\Models\Payment;

class PaymentsController extends Controller
{

    public function store(StorePaymentRequest $request)
    {
        $payment = Payment::create($request->all());
        return response()->json(["success" => true, "instance" => $payment]);
    }
}
