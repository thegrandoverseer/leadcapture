<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    //use Uuids;
    public $incrementing = false;

    public $fillable = ['id', 'first_name', 'last_name', 'email', 'phone', 'address', 'sqft'];

}
