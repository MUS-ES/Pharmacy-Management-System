<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoicesItems extends Model
{
    use HasFactory;
    protected $table = "invoices_items";
    protected $casts = [
        'meidcine_id' => 'integer',
        'qty' => 'integer',
        'discount' => 'integer',
        'invoice_id' => 'integer',
        'created_at' => 'date',
    ];
    protected $fillable = [
        'medicine_id',
        'qty',
        'discount',
        'invoice_id',
        'created_at',
    ];
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }
}
