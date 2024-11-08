<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Review\ReviewRelationsTrait;
use App\GeneralClasses\GeneralAttributesClass;

class Review extends Model
{
    use GeneralAttributesClass, ReviewRelationsTrait, SoftDeletes;
    public $guarded = [];
    public $eagerLoading = ['user'];

}
