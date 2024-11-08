<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Laratrust\Models\Role as RoleModel;
use App\Traits\Role\RoleRelationsTrait;
use App\Models\BaseModel;
use App\GeneralClasses\GeneralAttributesClass;

class Role extends RoleModel
{
    use GeneralAttributesClass, RoleRelationsTrait, SoftDeletes;
    public $guarded = [];

   
}
