<?php

namespace Modules\RequestWithdrawing\Http\Controllers\API\User;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\EloquentRepository;
 
use Modules\RequestWithdrawing\Repositories\User\RequestWithdrawingRepository;
use Modules\RequestWithdrawing\Entities\RequestWithdrawing;
use Modules\RequestWithdrawing\Resources\User\RequestWithdrawingResource;

class RequestWithdrawingController extends Controller
{
     
    /**
     * @var EloquentRepository
     */
    protected $eloquentRepo;
    /**
     * @var RequestWithdrawingRepository
     */
    protected $requestWithdrawingRepo;
        /**
     * @var RequestWithdrawing
     */
    protected $requestWithdrawing;
    
    /**
     * RequestWithdrawingsController constructor.
     *
     * @param RequestWithdrawingRepository $requestWithdrawings
     */
    public function __construct(EloquentRepository $eloquentRepo, RequestWithdrawing $requestWithdrawing,RequestWithdrawingRepository $requestWithdrawingRepo)
    {
       $this->eloquentRepo = $eloquentRepo;
        $this->requestWithdrawing = $requestWithdrawing;
        $this->requestWithdrawingRepo = $requestWithdrawingRepo;
    }
    /**
     * Display a listing of the resource via (all , pagination).
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $requestWithdrawings=$this->requestWithdrawingRepo->getData($this->requestWithdrawing,$this->requestWithdrawing->eagerLoading);
        $data = RequestWithdrawingResource::collection($requestWithdrawings);
        if (page()) $data = getDataResponse($data);        
        return successResponse(0,$data);
    }
    
}
