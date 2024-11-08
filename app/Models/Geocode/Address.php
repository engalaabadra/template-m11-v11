<?php

namespace App\Models\Geocode;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Geocode\Address\AddressRelationsTrait;
use App\Models\BaseModel;

class Address extends BaseModel 
{

    use AddressRelationsTrait, SoftDeletes;
    protected $appends = ['original_active'];
    public $guarded = [];

      
}
