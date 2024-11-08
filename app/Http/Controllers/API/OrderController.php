<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\Modules\Order\OrderRepository;
use App\Models\Order;

class OrderController extends Controller
{
     
    /**
     * @var OrderRepository
     */
    protected $orderRepo;
        /**
     * @var Order
     */
    protected $order;
    
    /**
     * OrderController constructor.
     *
     * @param OrderRepository $orders
     */
    public function __construct( Order $order,OrderRepository $orderRepo)
    {
        $this->order = $order;
        $this->orderRepo = $orderRepo;
    }

    /**
     * Store the  resource in storage.
     * @param Request $request 
     * @return Responsable
     * */
    public function store(StoreOrderRequest $request){
        $order=$this->orderRepo->store($request,$this->order,$this->order->eagerLoading);
        return successResponse(1,new OrderResource($order));
    }    


}
