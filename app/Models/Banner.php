<?php

namespace App\Models;

use App\Models\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Banner\BannerRelationsTrait;
use App\Models\BaseModel;
use App\GeneralClasses\GeneralAttributesClass;

class Banner extends BaseModel
{
    use  GeneralAttributesClass, BannerRelationsTrait,SoftDeletes;
    protected $appends = ['original_active'];
    public $guarded = [];
    public $eagerLoading = ['file'];
    

}
