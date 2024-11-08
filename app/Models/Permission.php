<?php

namespace App\Models;

use Laratrust\Models\Permission as PermissionModel;
use App\Models\BaseModel;
use App\GeneralClasses\GeneralAttributesClass;
 
class Permission extends PermissionModel
{
    use GeneralAttributesClass;
    protected $appends = ['original_active'];
    public $guarded = [];
}
