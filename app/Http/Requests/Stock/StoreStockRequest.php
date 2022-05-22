<?php

namespace App\Http\Requests\Stock;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class StoreStockRequest extends FormRequest
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
            "medicine" => ["required", Rule::exists("medicines", "name")->where("user_id", Auth::user()->id)],
            "mfd" => ["required", "before:" . now()],
            "exp" => ["required"],
            "qty" => ["required", "numeric", "min:1"],
            "supplier" => ["nullable", Rule::exists("suppliers", "name")->where("user_id", Auth::user()->id)],
        ];
    }
}
