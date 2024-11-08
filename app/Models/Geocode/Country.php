<?php

namespace App\Models\Geocode;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Geocode\Country\CountryRelationsTrait;
use App\Models\BaseModel;

class Country extends Model 
{
    use  CountryRelationsTrait, SoftDeletes;
//    protected $appends = ['original_active'];
    public $guarded = [];
      
    public $eagerLoading = ['users','cities'];

}
