<?php

namespace App\Traits\Geocode\Country;

use App\Models\User;
use App\Models\Geocode\Country;
use App\Models\State;


trait CountryRelationsTrait
{

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }
    public function states(){
        return $this->hasMany(State::class);
    }

}
