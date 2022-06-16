<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Voucher extends Model
{
    use HasFactory;
    protected $fillable = ["user_id", "type", "amount", "description", "date"];
}
