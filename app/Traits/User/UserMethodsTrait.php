<?php

namespace APP\Traits\User;

trait UserMethodsTrait{

   /**
    * Method for get Relations  User.
    *
    * @return object
    */
    public function getRelationsUser($model,$userId,$relation){
        $user = $model->find($userId) ?? 404;
        if($relation=='roles'){
            return $user->roles()->withoutGlobalScope(ActiveScope::class)->withoutGlobalScope(LanguageScope::class)->paginate(total());
        }elseif($relation=='permissions'){
            return $user->permissions()->withoutGlobalScope(ActiveScope::class)->withoutGlobalScope(LanguageScope::class)->paginate(total());
        }
    } 
    /**
    * Method hasRole.
    * @param $roleName
    * @return object
    */
    public function hasRole($roleName)
    {
        return $this->roles->contains('name', $roleName);
    }
    
}
