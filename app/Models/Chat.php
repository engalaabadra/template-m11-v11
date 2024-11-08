<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Chat\ChatRelationsTrait;
use App\Models\BaseModel;
use App\GeneralClasses\GeneralAttributesClass;

class Chat extends Model
{
    use  GeneralAttributesClass, ChatRelationsTrait, SoftDeletes;
    protected $appends = ['original_active'];
    public $guarded = [];
    public $eagerLoading = ['files','client','user'];

}
