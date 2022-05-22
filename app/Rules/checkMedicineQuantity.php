<?php

namespace App\Rules;

use App\Models\Medicine;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class checkMedicineQuantity implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    public function __construct()
    {
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        foreach ($value as $item)
        {
            $qty = Medicine::where("name", $item['medicine'])->where("user_id", Auth::user()->id)->with("stock")->whereRelation("stock", "qty", ">=", $item["qty"])->count();
            if ($qty == 0)
            {
                return false;
            }
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This quantity not available in stock.';
    }
}
