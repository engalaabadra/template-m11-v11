<?php

namespace APP\Traits\User;
use Illuminate\Support\Facades\Hash;

trait UserAttributesTrait{

    //mutators
    /**
     * Always encrypt the password when it is updated.
     *
     * @param $value
    * @return string
    */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

}
