<?php

namespace App\Traits\Geocode\State;

use App\Models\Geocode\City;
use App\Models\Geocode\AddressType;

trait StateRelationsTrait
{

    public function city(){
        return $this->belongsTo(City::class);
    }
    public function addressesTypes(){
        return $this->hasMany(AddressType::class);
    }
   
}
