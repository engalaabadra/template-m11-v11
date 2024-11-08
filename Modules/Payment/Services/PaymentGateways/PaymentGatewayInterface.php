<?php

namespace Modules\Payment\Services\PaymentGateways;

use Modules\Payment\Entities\Payment;

interface PaymentGatewayInterface{
    public function create($order,$user);//return url
    public function verify($id) : Payment;
    public function formOptions() : array;
}
