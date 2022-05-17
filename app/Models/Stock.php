<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = "medicines_stocks";
    use HasFactory;
    protected $fillable = [
        'user_id',
        'medicine_id',
        'mfd',
        'exp',
        'qty',
        'supplier_id',
    ];
    protected $hidden = [];
    public function medicine()
    {
        return    $this->belongsTo(Medicine::class);
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
