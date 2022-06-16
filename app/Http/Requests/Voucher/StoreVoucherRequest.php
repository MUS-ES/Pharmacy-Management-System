<?php

namespace App\Http\Requests\Voucher;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreVoucherRequest extends FormRequest
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
            "vouchers" => ["array"],
            "vouchers.*.type" => Rule::in(["Payment", "Receipt"]),
            "vouchers.*.amount" => ["required", "numeric", "not_in:0"],
            "vouchers.*.description" => ["nullable", "string"],
            "vouchers.*.date" => ["required", "date"],
        ];
    }
}
