<?php

namespace App\Models;

use App\Models\File;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\GeneralClasses\GeneralAttributesClass;

class Profile extends Model
{
    use SoftDeletes;
    protected $appends = ['original_gender'];

    public $fillable = ['full_name','nick_name','user_id','bio','gender','birth_date'];

    public $eagerLoading = ['user'];
    public function user() { 
        return $this->belongsTo(User::class); 
    }
    public function file(){
        return $this->morphOne(File::class, 'fileable');
    }
    
}
