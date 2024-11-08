<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Modules\Favorite\FavoriteRepository;
use App\Models\Favorite;
use App\Resources\FavoriteResource;
use App\Http\Requests\Favorite\AddToFavoriteRequest;

class FavoriteController extends Controller
{
     
    /**
     * @var FavoriteRepository
     */
    protected $favoriteRepo;
    /**
     * @var Favorite
     */
    protected $favorite;

    
    /**
     * FavoriteResourceController constructor.
     *
     * @param FavoriteRepository $favorites
     */
    public function __construct( Favorite $favorite,FavoriteRepository $favoriteRepo)
    {
        $this->favorite = $favorite;
        $this->favoriteRepo = $favoriteRepo;
    }
    /**
     * Display a listing of the resource (all , pagination).
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $favorites = $this->favoriteRepo->getData($this->favorite,$this->favorite->eagerLoading);
        $data = FavoriteResource::collection($favorites);
        if (page()) $data = getDataResponse($data);
        return successResponse(0,$data);
    }
     /**
     * Store the  resource in storage.
     * @param Request $request 
     * @return Responsable
     * 
     * */
    public function store(AddToFavoriteRequest $request){
        $favorite=$this->favoriteRepo->store($request,$this->favorite,$this->favorite->eagerLoading);
        if(is_numeric($favorite)) return clientError(4);// Return 404 not found
        if(is_string($favorite)) return clientError(0,$favorite);// Return the error message if data is missing
        return successResponse(1, new FavoriteResource($favorite));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $favorite= $this->favoriteRepo->destroy($this->favorite,$id,$this->favorite->eagerLoading);
        if(is_numeric($favorite)) return clientError(4);// Return 404 Not Found
        if(is_string($favorite)) return clientError(0,$favorite);// Return the error message if data is missing
        return successResponse(2, new FavoriteResource($favorite));
    }

}
