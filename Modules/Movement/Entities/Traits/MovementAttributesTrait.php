<?php

namespace Modules\Movement\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Movement\Entities\Traits\GeneralMovementTrait;

trait MovementAttributesTrait
{
    public function getTypeAttribute(){
        return  intval($this->attributes['type']);
    }
    public function getOriginalTypeAttribute(){
        $value=$this->attributes['type'];
        if($value=='1'){
            return trans('attributes.Deposition');
        }elseif ($value=='-1') {
            return trans('attributes.Withdrawing');
        }
    }
}
