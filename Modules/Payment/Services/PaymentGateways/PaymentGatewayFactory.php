<?php

namespace Modules\Payment\Services\PaymentGateways;

use Modules\Payment\Entities\Payment;
use Illuminate\Support\Str;
use Modules\Payment\Services\PaymentGateways\Paypal\Paypal;
class PaymentGatewayFactory{
    /** 
    * create class name for gw
    * @param string $gateway
    * @return \Modules\Payment\Services\PaymentGateways\PaymentGateway
    */
    public static function create($name)
    {
        
        $class = 'Modules\Payment\Services\PaymentGateways\\' . Str::studly($name).'\\'. Str::studly($name);
        try{
            return new $class();
        }catch(\Exception $e){
            throw new \Exception("Payment gateway {{$name}} not found ");
        }
        return new $class();
    }
    

    
}
