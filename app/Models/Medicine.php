<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;
    protected $hidden = [];
    protected $fillable = [
        "name",
        "generic_name",
        "strip_unit",
        "description",
        "price",
        "user_id",
    ];
    public function user()
    {
        return  $this->belongsTo(User::class);
    }
    public function stock()
    {
        return   $this->hasMany(Stock::class, "medicine_id", "id");
    }
}
