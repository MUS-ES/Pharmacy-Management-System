<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Invoice extends Model
{
    use HasFactory;
    protected $hidden = [];
    protected $casts = [
        'total' => 'integer',
        'total_discount' => 'integer',
        'total_net' => 'integer',
        'paid' => 'integer',
        'customer_id' => 'integer',
        'user_id' => 'integer',
        'payment_id' => 'integer',
    ];
    protected $fillable = [
        'total',
        'total_discount',
        'total_net',
        'paid',
        'customer_id',
        'user_id',
        'payment_id',
    ];
    public function user()
    {
        return  $this->belongsTo(User::class);
    }
    public function customer()
    {
        return  $this->belongsTo(Customer::class);
    }
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
    public function invoiceItems()
    {
        return  $this->hasMany(InvoicesItems::class);
    }
}
