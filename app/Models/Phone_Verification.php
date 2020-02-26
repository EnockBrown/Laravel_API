<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone_Verification extends Model
{
    protected $fillable=[
        'mobile_number',
        'verification_code',
        'verified'
    ];
}
