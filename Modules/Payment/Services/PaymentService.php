<?php

namespace Modules\Payment\Services;

use Carbon\Exceptions\Exception;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Modules\Payment\Entities\Payment;
use Modules\Payment\Entities\PaymentMethod;
use Modules\Payment\Services\PaymentGateways\PaymentGatewayFactory;
use Modules\Payment\Traits\PaymentMethodPaypalTrait;
use Symfony\Component\HttpKernel\Exception\HttpException;

class PaymentService{
    //get payment , payment method , transaction
    public function getPayment(){
        $paymentMethodSlug = Session::get('payment_method_id');
        $paymentMethod = PaymentMethod::where('slug',$paymentMethodSlug)->first();
        if(!$paymentMethod) return trans('messages.this slug payment method not found , pls select again');
        $transactionId = Session::get('transaction_id');
        $payment = Payment::where(['transaction_id'=>$transactionId])->first();
        if(!$payment) return 404;
        return [
            'payment_method'=>$paymentMethod,
            'payment'=>$payment,
            'transaction_id'=>$transactionId
        ];
    }
    public function createPayment($order , $user , $response){
        $payment = Payment::create([
            // 'payment_method_id'=>$this->paymentMethod->id,
            'paymentable_id'=>$order->id,
            'paymentable_type'=>get_class($order),
            'payer_id'=>$user->id ,
            'payer_type'=>get_class($user),
            'amount'=>$order->total,
            'currency_code'=>$order->currency_code,
            'type'=>'payment',
            'status'=>0,
            'transaction_id'=>$response->transaction->id,
            'payment_response'=>$response->result
        ]);
        return $payment;
    }
    public function updatePayment($id, $paymentMethodId, $status){
        $payment = Payment::where('transaction_id',$id)
                    ->where('payment_method_id', $paymentMethodId)
                    ->first();
        $payment['status'] = $status;
        $payment->save();
        return $payment;
    }
}
