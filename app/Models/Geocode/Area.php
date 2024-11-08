<?php

namespace App\Models\Geocode;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Geocode\Area\AreaRelationsTrait;
use App\Models\BaseModel;

class Area extends BaseModel 
{
    use AreaRelationsTrait, SoftDeletes;
    protected $appends = ['original_active'];
    public $guarded = [];


}
