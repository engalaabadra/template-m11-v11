<?php
namespace Modules\Payment\Services\PaymentGateways\Thawani;

class ThawaniService{
    
    protected function client(){
        if(!$this->client()){
            $client = new ThawaniHttpClient(
                    new SandboxEnvironment(
                        $this->paymentMethod->options['client_id'],
                        $this->paymentMethod->options['client_secert'],
                        
                    )
                );   
        }
        return $this->client;
        
    }
    protected function setDataPayment($order){
        $data = [
            'client_reference_id' => 'Test payment1',
            'mode' => 'payment',
            'products'=>[
                [
                    'name'=>'pro1',
                    'amount'=>100,
                    'quantity'=>2
                ]
                
            ],
            'success_url'=>route('payment.return','thawani'),
            'cancel_url'=>route('payment.cancel','thawani'),
        ];
        return $data;
    }
    
}