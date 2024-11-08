<?php

namespace App\Models\Geocode;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Geocode\City\CityRelationsTrait;
use App\Models\BaseModel;

class City extends BaseModel 
{
    use CityRelationsTrait, SoftDeletes;
    protected $appends = ['original_active'];
    public $guarded = [];


   
}
