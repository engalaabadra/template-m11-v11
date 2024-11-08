<?php

namespace App\Traits\Geocode\City;

trait CityMethodsTrait
{

    public function getRelationStatesCity($model,$request,$cityId){
        $city = $model->find($cityId) ?? 404;
        if(is_string($city)){
            return $city;
        }
        $StatesCity = $city->states()->withoutGlobalScope(ActiveScope::class)->withoutGlobalScope(LanguageScope::class)->paginate($request->total);
        return  $StatesCity;
    }
}
