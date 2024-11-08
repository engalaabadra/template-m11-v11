<?php

namespace App\Traits\Geocode\AddressType;

use App\Models\Address;

trait AddressTypeRelationsTrait
{
    public function addresses(){
        return $this->hasMany(Address::class);
    }
    
}
