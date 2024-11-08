<?php

namespace Modules\Movement\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Movement\Repositories\MovementRepository;
use Modules\Movement\Entities\Movement;
use Modules\Movement\Resources\MovementResource;

class MovementController extends Controller
{
     
    /**
     * @var MovementRepository
     */
    protected $movementRepo;
        /**
     * @var Movement
     */
    protected $movement;
    
    /**
     * MovementController constructor.
     *
     * @param MovementRepository $movements
     */
    public function __construct( Movement $movement,MovementRepository $movementRepo)
    {
        $this->movement = $movement;
        $this->movementRepo = $movementRepo;
    }
    /**
     * Display a listing of the resource via (all , pagination).
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $movements = $this->movementRepo->getData($this->movement,$this->movement->eagerLoading);
        $data = MovementResource::collection($movements);
        if (page()) $data = getDataResponse($data);
        return successResponse(0,$data);
    }
}
