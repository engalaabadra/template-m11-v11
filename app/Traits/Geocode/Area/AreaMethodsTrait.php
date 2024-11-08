<?php

namespace App\Traits\Geocode\Area;


trait AreaMethodsTrait
{

    public function getRelationAddressesTypesArea($model,$request,$areaId){
        $area = $model->find($areaId) ?? 404;
        if(is_string($area)){
            return $area;
        }
        $AddressesTypesArea = $area->addressesTypes()->withoutGlobalScope(ActiveScope::class)->withoutGlobalScope(LanguageScope::class)->paginate($request->total);
        return  $AddressesTypesArea;
    }
}
