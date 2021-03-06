<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Purchase extends Model
{
    use HasFactory;
    protected $fillable = [
        'total',
        'paid',
        'supplier_id',
        'user_id',
        'payment_id',
        'date',
    ];
    protected $casts = [
        'total' => 'double',
        'paid' => 'double',
        'rest' => 'double',
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
