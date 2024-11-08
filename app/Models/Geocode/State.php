<?php

namespace App\Models\Geocode;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Geocode\State\StateRelationsTrait;
use App\Models\BaseModel;

class State extends BaseModel 
{
    use StateRelationsTrait, SoftDeletes;
    protected $appends = ['original_active'];
    public $guarded = [];

}
