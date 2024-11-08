<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\File\FileRelationsTrait;

class File extends Model
{
    use FileRelationsTrait;
    protected $fillable = ['fileable_id', 'fileable_type', 'url'];

    
}