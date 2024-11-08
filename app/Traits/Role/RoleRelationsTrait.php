<?php

namespace APP\Traits\Role;

trait RoleRelationsTrait{
    
    public function users(){
        return $this->belongsToMany(User::class,'role_user','role_id','user_id');
    }
    // public function permissions(){
    //     return $this->belongsToMany(Permission::class,'permission_role','role_id','permission_id');
    // }

    public function admins(){
        return $this->belongsToMany(Admin::class,'role_user','role_id','user_id');
    }


}
