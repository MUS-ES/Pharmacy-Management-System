<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $fillable = [
        'total',
        'supplier_id',
        'user_id',
        'payment_id',
        'created_at',
    ];
    public function user()
    {
        return  $this->belongsTo(User::class);
    }
    public function supplier()
    {
        return  $this->belongsTo(Supplier::class);
    }
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
    public function purchaseItems()
    {
        return  $this->hasMany(PurchaseItems::class);
    }
}
