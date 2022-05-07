<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoices_Items extends Model
{
    use HasFactory;
    protected $table = "invoices_items";
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
