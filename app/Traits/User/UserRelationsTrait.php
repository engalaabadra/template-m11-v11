<?php

namespace APP\Traits\User;

use App\Models\Role;
use App\Models\Profile;
use App\Models\Review;
use App\Models\Permission;
use App\Models\Favorite;
use App\Models\Chat;
use App\Models\Wallet;
use App\Models\Geocode\Country;

trait UserRelationsTrait{
    
    // public function roles(){
    //     return $this->belongsToMany(Role::class,'role_user','user_id','role_id');
    // }
    // public function permissions(){
    //     return $this->belongsToMany(Permission::class,'permission_user','user_id','permission_id');
    // }
    public function country(){
        return $this->belongsTo(Country::class,'country_id');
    }

    public function profile() {
        return $this->hasOne(Profile::class);
    }
    public function reviewsUser(){
        return $this->hasMany(Review::class,'user_id');
    }
    public function favoritesUser(){
        return $this->hasMany(Favorite::class,'user_id');
    }

    public function chatClients(){
        return $this->hasMany(Chat::class,'client_id');
    }

    public function chatUsers(){
        return $this->hasMany(Chat::class,'user_id');
    }

    public function wallet(){
        return $this->hasOne(Wallet::class,'user_id');
    }

}
