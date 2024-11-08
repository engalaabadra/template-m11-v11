<?php
namespace Modules\Payment\Services\PaymentGateways\Paypal;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use Modules\Payment\Entities\PaymentMethod;
class PaypalService{

    public $client;
    public function __construct()//from payment method will take any thing not only options
    {
        $this->paymentMethod = PaymentMethod::where('slug', 'paypal')->first();
    }
    
    public function client(){// this meth for only paypal
        if(!$this->client){// in the starting , client not created
            if (empty($this->paymentMethod->options['client_id']) || empty($this->paymentMethod->options['client_secret'])) {
                \Log::error('PayPal Client ID or Secret is missing.');
                throw new \Exception('Invalid PayPal credentials.');
            }
            $this->client = new PaypalHttpClient(
                    new SandboxEnvironment(
                        $this->paymentMethod->options['client_id'] ?? null ,// options -> col in payment_methods in db , that it enter in construct Paypal class
                        $this->paymentMethod->options['client_secert'] ?? null,
                        // env('PAYPAL_CLIENT_ID'),
                        // env('PAYPAL_CLIENT_SECRET'),
                    )
                );   
        }
        return $this->client;
        
    }
    public function setDataPayment($order){
        $request = new OrdersCreateRequest();
        $request->prefer('return=representation');
        $request->body = [
                        "intent"=>"CAPTURE",
                        'purchase_units' => [[
                            "reference_id"=>"test_ref_id1",
                            "amount"=>[
                                "value"=>10,
                                "currency_code"=>"USD"
                            ]
                        ]],
                        "application_context" => [
                            "cancel_url" => route('payment.cancel','paypal'),
                            "return_url" => route('payment.return','paypal'),
                        ]
            ];
        return $request;

    }
}