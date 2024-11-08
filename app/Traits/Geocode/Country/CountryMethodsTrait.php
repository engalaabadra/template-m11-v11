<?php

namespace App\Traits\Geocode\Country;

trait CountryMethodsTrait
{

    protected function getRelationCitiesCountry($model,$countryId){
        $country = $model->find($countryId) ?? 404;
        if(is_string($country)){
            return $country;
        }
        $citiesCountry = $country->cities()->paginate(total());
        return  $citiesCountry;
    }
}
