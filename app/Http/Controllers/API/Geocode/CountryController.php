<?php

namespace App\Http\Controllers\API\Geocode;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\EloquentRepository;
 
use Illuminate\Http\Request;
use App\Repositories\Modules\Geocode\Country\CountryRepository;
use App\Models\Geocode\Country;
use App\Resources\Geocode\CountryResource;

class CountryController extends Controller
{
     
    /**
     * @var EloquentRepository
     */
    protected $eloquentRepo;
    /**
     * @var CountryRepository
     */
    protected $countryRepo;
        /**
     * @var Country
     */
    protected $country;
        /**
     * CountryController constructor.
     *
     * @param CountryRepository $countries
     */
    public function __construct(EloquentRepository $eloquentRepo, Country $country,CountryRepository $countryRepo)
    {
       $this->eloquentRepo = $eloquentRepo;
        $this->country = $country;
        $this->countryRepo = $countryRepo;
    }
    /**
     * Display a listing of the resource via (all , pagination).
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $countries=$this->countryRepo->getData($this->country);
        $data = CountryResource::collection($countries);
        if (page()) $data = getDataResponse($data);
        return successResponse(0,$data);
    }
}