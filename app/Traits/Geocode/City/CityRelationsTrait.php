<?php

namespace App\Traits\Geocode\City;

use App\Models\Geocode\Country;
use App\Models\State;

trait CityRelationsTrait
{

    public function country(){
        return $this->belongsTo(Country::class);
    }
    public function states(){
        return $this->hasMany(State::class);
    }
   
}
