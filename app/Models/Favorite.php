<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Favorite\FavoriteRelationsTrait;
use App\Models\BaseModel;
use App\GeneralClasses\GeneralAttributesClass;

class Favorite extends Model
{
    use GeneralAttributesClass, FavoriteRelationsTrait;
    protected $appends = ['original_active'];
    public $guarded = [];
    public $eagerLoading = ['user'];

}
