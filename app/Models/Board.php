<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Board\BoardRelationsTrait;
use App\Models\BaseModel;
use App\GeneralClasses\GeneralAttributesClass;

class Board extends BaseModel
{
    use GeneralAttributesClass, BoardRelationsTrait, SoftDeletes;
    protected $appends = ['original_active'];
    public $guarded = [];
    public $eagerLoading = ['file'];

}

