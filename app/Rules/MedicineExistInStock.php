<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Medicine;
use Illuminate\Support\Facades\Auth;

class MedicineExistInStock implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $exist = Medicine::join("medicines_stocks", "medicines.id", "=", "medicines_stocks.medicine_id")->where("medicines.name", $value)->where("medicines_stocks.user_id", Auth::user()->id)->count();
        return ($exist != 0) ? true : false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This Medicine not Exist In Your Inventory.';
    }
}
