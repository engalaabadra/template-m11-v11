<?php

namespace Modules\Payment\Services;

use Illuminate\Support\Facades\Session;
use Modules\Payment\Entities\Payment;
use Modules\Payment\Entities\PaymentMethod;
use Modules\Payment\Services\PaymentGateways\PaymentGatewayFactory;
use Modules\Payment\Traits\PaymentMethodTapTrait;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Wallet implements PaymentGatewayFactory
{
    use PaymentMethodTapTrait;
    protected $paymentMethod;
    protected string $tapBaseUrl = 'https://api.tap.company/v2';
    protected string $tapAuthSecret;

    public function __construct(PaymentMethod $paymentMethod , PaymentService $paymentService , $options)
    {
        $this->paymentMethod = $paymentMethod;
        $this->paymentService = $paymentService;
        $this->tapAuthSecret = config('services.tap.secret_test');
    }


    public function create($order,$user) : string{//when go into page a payment(when checkout for an order)->when click on checkout or reservation will appear url from this meth
        //prepare url for callback
        $data['redirect']['url']= url(route("api.payments.callback",[$order->id]));//when press on pay now
        //set data payment via wallet
        $data = $this->setDataPayment($order,$user);
        //set curl
        $response = $this->setCurl();
        if($response&&isset($response->errors)){
            return $response;
        }
        //create a movement for this wallet on on this order , but it will been a pending , after callback (click pay now) will become success
        // $movement = $this->createMovement();
        //store transaction id , payment id in session
        Session::put('transaction_id',$response['session_id']);
        Session::put('payment_id',$payment->id);
        return $response->transaction->url;
    }
    public function verify() : Payment{//when click on pay now
        $resultPayment = $this->paymentService->getPayment();
        try{
            $response = $this->checkDataPaymentCallback();
            if (isset($response->errors)) return response()->json($response->errors);
            if ($response->status === 'CAPTURED') {
                // Handle successful payment
                // Add additional logic for handling payment capture, such as notifications and movements
                // $this->handlePaymentCapture($response);
                //will update status payment in db into status = 1 success & store payment method slug
                $payment = $this->updatePayment($resultPayment,$response,1);
            } else {
                //will update status payment in db into status = -1 faild
                $payment = $this->updatePayment($resultPayment,$response,-1);
            }
            Session::forget(['payment_id','session_id']);
            return $payment;
        }catch(HttpException $ex){
            echo $ex->statusCode;
            print_r($ex->getMessage());
        }
    }
}
