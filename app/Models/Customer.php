<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contact',
        'address',
        'user_id',
        'created_at',
    ];
    public function user()
    {
        return  $this->belongsTo(User::class);
    }
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
