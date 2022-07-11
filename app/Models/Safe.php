<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Safe extends Model
{
    use HasFactory;
    protected $fillable = ["user_id", "total"];
    protected $casts = [
        'total' => 'double',
    ];
    public function user()
    {
        return  $this->belongsTo(User::class);
    }
}
