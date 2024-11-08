<?php

namespace App\Traits\Geocode\Area;

use App\Models\AddressType;
use App\Models\State;

trait AreaRelationsTrait
{

    public function state(){
        return $this->belongsTo(State::class);
    }
    public function addressesTypes(){
        return $this->hasMany(AddressType::class);
    }

}
