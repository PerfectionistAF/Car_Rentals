<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    //use HasFactory;
    protected $table = "orders";
    public function customer():BelongsTo{
        return $this->belongsTo(Customer::class);
    }
        //to access all customers for a specific order
}
