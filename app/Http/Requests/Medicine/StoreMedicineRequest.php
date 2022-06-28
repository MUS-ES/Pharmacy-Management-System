<?php

namespace App\Http\Requests\Medicine;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;

class StoreMedicineRequest extends FormRequest
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
            'name' => ['required', Rule::unique("medicines", "name")->where("user_id", Auth::user()->id)],
            'generic' => 'required|string',
            'unit' => 'required|numeric|min:1|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ];
    }
}
