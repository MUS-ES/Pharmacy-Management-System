<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Purchase;
use App\Models\Medicine;

class PurchaseItems extends Model
{
    use HasFactory;
    protected $table = "purchases_items";
    protected $fillable = [
        'medicine_id',
        'qty',
        'unit_price',
        'purchase_id',
        'mfd',
        'exp',
        'created_at',
    ];
    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }
    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }
}
