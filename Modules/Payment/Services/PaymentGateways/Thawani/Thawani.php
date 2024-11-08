<?php

namespace Modules\Payment\Services\PaymentGateways\Thawani;

use Carbon\Exceptions\Exception;
use Illuminate\Support\Facades\Session;
use Modules\Payment\Entities\Payment;
use Modules\Payment\Entities\PaymentMethod;
use Modules\Payment\Traits\PaymentMethodThawaniTrait;
use Twilio\Exceptions\HttpException;
use Modules\Payment\Services\PaymentGateways\PaymentGatewayInterface;
class Thawani implements PaymentGatewayInterface
{
    protected $paymentMethod;
    protected $thawaniService;
    protected $options;
    protected $client;
    public function __construct(PaymentMethod $paymentMethod, PaymentService $paymentService, ThawaniService $thawaniService  , $options)
    {
        $this->paymentMethod = $paymentMethod;
        $this->paymentService = $paymentService;
        $this->thawaniService = $thawaniService;
        $this->options = $options;
    }
    
   public function create($order, $user) : string
   {
    $data = $this->paymentService->setDataPayment($order);
    try{
        $response = $this->client->createCheckoutSession($data);
        $payment = $this->paymentService->createPayment($order , $user , $response);
        //store transaction id , payment id in session
        Session::put('transaction_id',$response['session_id']);
        Session::put('payment_id',$payment->id);

    } catch (Exception $ex) {
        echo $ex->statusCode;
        print_r($ex->getMessage);
    }
    
   }

   public function verify() : Payment
   {
        $resultPayment = $this->paymentService->getPayment();
        try{
            $transaction_id = Session::get('transaction_id');
            $response = $this->client->getCheckoutSession($transaction_id);
            if($response['data']['payment_status'] == 'paid'){
                $payment = $this->paymentService->updatePayment($resultPayment,$response,1);
            }elseif($response['data']['payment_status'] == 'faild'){
                $payment = $this->paymentService->updatePayment($resultPayment,$response,-1);
            }
            Session::forget(['payment_id','session_id']);
            return $payment;
        }catch(HttpException $ex){
            echo $ex->statusCode;
            print_r($ex->getMessage());
        }
   }

   
}