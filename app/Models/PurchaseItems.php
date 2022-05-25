<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseItems extends Model
{
    use HasFactory;
    protected $table = "purchases_items";
    protected $fillable = [
        'medicine_id',
        'qty',
        'unit_price',
        'purchase_id',
        'created_at',
    ];
}
