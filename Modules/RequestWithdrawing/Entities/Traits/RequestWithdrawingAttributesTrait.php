<?php

namespace Modules\RequestWithdrawing\Entities\Traits;


trait RequestWithdrawingAttributesTrait
{
        //Accessories
   public function getStatusAttribute()//0: reason cancelation , 1:reason reschualing
   {
       return $this->attributes['status'] ?? null;
   }

   public function getOriginalStatusAttribute()
   {
       if (!isset($this->attributes['status'])) {
           return null;
       }

       $statusLabels = [
           0  => trans('attributes.Not Review'),
           1  => trans('attributes.Reviewing'),
           2  => trans('attributes.Accepted'),
           -1 => trans('attributes.Rejected'),
       ];

       return $statusLabels[$this->attributes['status']] ?? null;
   }
}
