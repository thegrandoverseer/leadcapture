<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    //use Uuids;
    public $incrementing = false;

    public $fillable = ['id', 'first_name', 'last_name', 'email', 'phone', 'address', 'sqft'];
    
    public function getFullNameAttribute() {
        return implode(', ', array_filter([$this->last_name, $this->first_name]));
    }



}
