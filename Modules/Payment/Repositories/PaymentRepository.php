<?php
namespace Modules\Payment\Repositories;

use Modules\Payment\Repositories\PaymentMethodRepositoryInterface;
use App\Repositories\Eloquent\EloquentRepository;
 
use Illuminate\Support\Facades\Session;
use  Modules\Payment\Entities\PaymentMethod;
use Modules\Payment\Services\PaymentGateways\PaymentGatewayFactory;

class PaymentRepository extends EloquentRepository implements PaymentMethodRepositoryInterface
{
    use  PaymentMethod;


    public function callback(){
        //will get gateway from payment id in session that put it in create meth 
        $gateway = PaymentMethod::where('id',Session::get('payment_method_id'))->first();
        return $gateway->verify($gateway);//return object payment
    }

    

}