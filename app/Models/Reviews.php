<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    protected $fillable = [
        'review',
        'from_users_id',
        'product_name',
    ];
}
