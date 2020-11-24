<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name','email','password','confirm_password','phone','state','pin_code','address'
    ];
}
