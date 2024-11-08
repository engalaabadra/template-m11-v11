<?php

namespace APP\Traits\Role;

trait RoleMethodsTrait{
    /**
    * Method for get Relations  Role.
    *
    * @return object
    */    
    public function getRelationsRole($model,$roleId,$relation){
        $role = $model->find($roleId) ?? 404;
        if($relation=='users'){
            return $role->users()->withoutGlobalScope(ActiveScope::class)->withoutGlobalScope(LanguageScope::class)->paginate(total());
    }elseif($relation=='permissions'){
            return $role->permissions()->withoutGlobalScope(ActiveScope::class)->withoutGlobalScope(LanguageScope::class)->paginate(total());
        }
        
    }
}