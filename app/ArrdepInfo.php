<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArrdepInfo extends Model
{
    public function getFirstDelayTimeAttribute($value)
    {
        return ucfirst($value);
    }

    public function delay_id(){
        return $this->hasOn('\App\DelayFlight','flightid');
    }
}
