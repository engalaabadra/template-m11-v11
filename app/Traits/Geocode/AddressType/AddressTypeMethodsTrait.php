<?php

namespace App\Traits\Geocode\AddressType;


trait AddressTypeMethodsTrait 
{

    public function getRelationAddressesType($model,$request,$TypeId){
        $Type = $model->find($TypeId) ?? 404;
        $addressesType = $Type->addresses()->withoutGlobalScope(ActiveScope::class)->withoutGlobalScope(LanguageScope::class)->paginate($request->total);
        return  $addressesType;
    }
}
