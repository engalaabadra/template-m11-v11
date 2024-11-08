<?php

namespace App\Models;

 
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Geocode\Country;
use App\Traits\User\UserRelationsTrait;
use Laratrust\Traits\HasRolesAndPermissions;
use Laratrust\Contracts\LaratrustUser;
use App\Models\BaseModel;
use App\GeneralClasses\GeneralAttributesClass;
use APP\Traits\User\UserAttributesTrait;

class User extends Authenticatable implements LaratrustUser
{
    use GeneralAttributesClass, UserAttributesTrait , UserRelationsTrait , HasApiTokens, HasRolesAndPermissions,  HasFactory, Notifiable,SoftDeletes;
    public $fillable = [
        'fcm_token',
        'full_name',
        'nick_name',
        'password',
        'country_id',
        'phone_no',
        'email',
        'email_verified_at',
        'phone_verified_at',
    ];

    public $eagerLoading = ['file'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime'
        ];
    }


}
