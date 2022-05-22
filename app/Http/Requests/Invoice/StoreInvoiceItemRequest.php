<?php

namespace App\Http\Requests\Invoice;

use App\Rules\checkMedicineQuantity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreInvoiceItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            "medicine" => ['required', Rule::exists("medicines", "name")->where("user_id", Auth::user()->id)],
            "qty" => ["required", "numeric", "min:1", new checkMedicineQuantity("para")],
            "discount" => "required|numeric|min:0",
            "invoice_id" => ['required', 'numeric'],

        ];
    }
}
