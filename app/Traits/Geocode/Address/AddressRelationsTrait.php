<?php

namespace App\Traits\Geocode\Address;

use App\Models\AddressType;
use App\Models\Geocode\Country;
use App\Models\City;
use App\Models\State;
use App\Models\Area;

trait AddressRelationsTrait
{
    
    public function addressType(){
        return $this->belongsTo(AddressType::class);
    }
    public function country(){
        return $this->belongsTo(Country::class);

    }
    public function city(){
        return $this->belongsTo(City::class);

    }
    public function state(){
        return $this->belongsTo(State::class);

    }
    public function area(){
        return $this->belongsTo(Area::class);

    }
      
}
