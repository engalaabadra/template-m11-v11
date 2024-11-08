<?php

namespace Modules\Movement\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Movement\Entities\Traits\MovementRelationsTrait;
 

class Movement extends Model
{
    use  MovementRelationsTrait, SoftDeletes;
    protected $appends = ['original_active'];
    public $guarded = [];
    public $eagerLoading = ['wallet','payment'];

    //attributes
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
    //relations
    public function wallet(){
        return $this->belongsTo(Wallet::class);
    }
    public function payment(){
        return $this->belongsTo(Payment::class);
    }
}
