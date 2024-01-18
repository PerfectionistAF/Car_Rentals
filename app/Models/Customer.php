<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;
    protected $table = "customers";

    public function orders():HasMany{  //:return type
        return $this->hasMany(Order::class);
    }
    //to access all orders that customer makes
}
