<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = "medicines_stocks";
    use HasFactory;

    protected $hidden = [];
    public function medicine()
    {
        return    $this->belongsTo(Medicine::class);
    }
}
