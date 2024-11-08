<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\BaseModel;
use App\GeneralClasses\GeneralAttributesClass;

class Contact extends BaseModel
{
    use GeneralAttributesClass, SoftDeletes;
    protected $appends = ['original_active'];
    public $guarded = [];

}
