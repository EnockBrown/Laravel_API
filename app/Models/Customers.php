<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $fillable=[
        'user_id',
        'first_name',
        'middle_name',
        'last_name',
        'user_phone',
        'user_email',
        'unique_id',
        'country',
        'cover_image',
    ];
}
