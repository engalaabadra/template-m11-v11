<?php
namespace App\Traits\Review;

trait ReviewRelationsTrait{
    
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
