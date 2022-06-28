<?php

namespace App\Http\Requests\Purchase;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class StorePurchaseRequest extends FormRequest
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
            "total" => "required|numeric",
            "paid" => "required|numeric",
            "supplier" => [Rule::exists("suppliers", "name")->where("user_id", Auth::user()->id)],
            "provider" => Rule::in(["Cash", "Net Banking"]),
            "status" => "required",
            "date" => "required|date",
            "items.*.medicine" => ['required', Rule::exists("medicines", "name")->where("user_id", Auth::user()->id)],
            "items.*.mfd" => 'required|date_format:"Y-m-d"',
            "items.*.exp" => 'required|date_format:"Y-m-d"',
            "items.*.qty" => 'required|numeric',
            "items.*.price" => 'required|numeric',
            "items" => ["required", "array"],

        ];
    }
}
