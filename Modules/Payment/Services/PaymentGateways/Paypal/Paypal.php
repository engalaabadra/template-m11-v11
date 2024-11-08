<?php

namespace Modules\Payment\Services\PaymentGateways\Paypal;

use Carbon\Exceptions\Exception;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Modules\Payment\Entities\Payment;
use Modules\Payment\Entities\PaymentMethod;
use Modules\Payment\Services\PaymentGateways\PaymentGatewayInterface;
use Modules\Payment\Traits\PaymentMethodPaypalTrait;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Modules\Payment\Services\PaymentService;
 use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

class Paypal implements PaymentGatewayInterface
{
    protected $paymentMethod;
    public PaypalService $paypalService;
    public $paymentService;
    public $client;

    public function __construct()//from payment method will take any thing not only options
    {
        $this->paymentMethod = PaymentMethod::where('slug', 'paypal')->first();
        $this->paypalService = new PaypalService();
        $this->paymentService = new PaymentService();
        $this->client = $this->paypalService->client();
    }


   public function create($order, $user) // response view or route
   {
        $data = $this->paypalService->setDataPayment($order);
        try{
            $response = $this->client->execute($data);
            foreach($response->result->links as $link){
                if($link->rel == 'approve'){
                //    $payment = $this->paymentService->createPayment($order , $user , $response);
                //store transaction id , payment id in session
                  //  Session::put('transaction_id',$response['session_id']);
                  //  Session::put('payment_id',$payment->id);
                //    return $link->href;
                    return redirect()->away($link->href);// away -> redirect for external link
                }
            }
            if($response->rel == 'approve'){
            }
        } catch (Exception $ex) {
            echo $ex->statusCode;
            print_r($ex->getMessage);

        }
   }

   public function verify($id) : Payment//when click on pay now
   {
        $resultPayment = $this->paymentService->getPayment();
        $request = new OrdersCaptureRequest($id);
        $request->prefer('return=representation');
        try{
            $response = $this->client->execute($request);
            if($response->result->status == 'COMPLETED'){
                $payment = $this->paymentService->updatePayment($id, $paymentMethodId,$status = 1);
            }elseif($response->result->status == 'CANCELED'){
                $payment = $this->paymentService->updatePayment($id, $paymentMethodId,$status = -1);
            }
            Session::forget(['payment_id','session_id']);
            return $payment;
        }catch(HttpException $ex){
            echo $ex->statusCode;
            print_r($ex->getMessage());
        }
   }
//method formoptions to showing in dashboard 2 inputs -> client_id , secret_id after enter it will add these into gw in db 
   public function formOptions() : array
   {
        return [
            'client_id' => [
                'type' => 'text',
                'label' => 'Client ID',
                'placeholder' => 'Client ID',
                'required' => 'true',
                'validation' => 'required|string|max:225',
            ],
            'client_secret' => [
                'type' => 'text',
                'label' => 'Client Secret',
                'placeholder' => 'Client Secret',
                'required' => 'true',
                'validation' => 'required|string|max:225',
            ]
        ];
   }
}
