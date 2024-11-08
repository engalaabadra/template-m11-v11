<?php

namespace App\Models\Geocode;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Geocode\AddressType\AddressTypeRelationsTrait;
use App\Models\BaseModel;

class AddressType extends BaseModel 
{
    use AddressTypeRelationsTrait, SoftDeletes;
    protected $appends = ['original_active'];
    public $guarded = [];

}
