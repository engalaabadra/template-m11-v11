<?php

namespace Modules\Payment\Http\Controllers\API\User;
use App\Http\Controllers\Controller;
 
use Modules\Payment\Entities\PaymentMethod;
use Modules\Payment\Repositories\User\PaymentMethodRepository;
use Modules\Payment\Resources\User\PaymentMethodResource;
use Modules\Payment\Resources\User\PaymentResource;

class PaymentMethodController extends Controller
{
     
    /**
     * @var PaymentMethodRepository
     */
    protected $paymentMethodRepo;
    /**
     * @var PaymentMethod
     */
    protected $paymentMethod;
    
    /**
     * PaymentResourceController constructor.
     *
     * @param PaymentRepository $payments
     */
    public function __construct( PaymentMethod $paymentMethod,PaymentMethodRepository $paymentMethodRepo)
    {
        $this->paymentMethod = $paymentMethod;
        $this->paymentMethodRepo = $paymentMethodRepo;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){//get all payment methods , will appear  as a list in page checkout order
        $paymentMethods=$this->paymentMethodRepo->getData($this->paymentMethod,$this->paymentMethod->eagerLoading);
        $data = PaymentMethodResource::collection($paymentMethods);
        if (page()) $data = getDataResponse($data);
        return successResponse(0, $data);
    }
 
}
