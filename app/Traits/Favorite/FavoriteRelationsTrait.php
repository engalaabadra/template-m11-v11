<?php

namespace APP\Traits\Favorite;

use App\Models\User;

trait FavoriteRelationsTrait{
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
