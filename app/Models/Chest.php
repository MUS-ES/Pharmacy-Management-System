<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chest extends Model
{
    use HasFactory;
    protected $casts = [
        'total' => 'double',
    ];
    public function user()
    {
        return  $this->belongsTo(User::class);
    }
}
