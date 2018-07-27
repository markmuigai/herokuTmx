<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    //A delivery belongs to a user
    public function User()
    {
    	return $this->belongsTo(User::class);
    }

    public function Vehicle()
    {
    	return $this->belongsTo(Vehicle::class);
    }
}
