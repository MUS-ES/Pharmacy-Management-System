<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PhpParser\Node\Expr\FuncCall;
use App\Models\Invoice;
use App\Models\Customer;
use App\Models\Supplier;
use App\Models\Medicine;
use App\Models\Stock;
use App\Models\Purchase;
use App\Models\Chest;
use App\Models\Safe;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $attributes = [
        'active' => '0',
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'fullname',
        'ph_name',
        'licence',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'active',
        'ph_name',
        'fullname',
        'licence',
        'email_verified_at',
        'created_at',
        'updated_at',


    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'active' => 'bool',
    ];

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
    public function suppliers()
    {
        return $this->hasMany(Supplier::class);
    }
    public function medicines()
    {
        return $this->hasMany(Medicine::class);
    }
    public function stock()
    {
        return $this->hasMany(Stock::class);
    }
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
    public function chest()
    {
        return $this->hasMany(Chest::class);
    }
    public function safe()
    {
        return $this->hasMany(Safe::class);
    }
}
