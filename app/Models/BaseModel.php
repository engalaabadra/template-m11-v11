<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\ActiveScope;
use App\Scopes\LanguageScope;

class BaseModel extends Model
{

    //global scopes
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ActiveScope);
        static::addGlobalScope(new LanguageScope);
    }
}
