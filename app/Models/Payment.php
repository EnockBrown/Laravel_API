<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'product_name',
        'amount',
        'payment_id',
        'customer_id',
        'status',
        'quantity',
    ];
}
