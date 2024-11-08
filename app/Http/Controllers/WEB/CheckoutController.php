<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Payment\Entities\PaymentMethod;
use Modules\Payment\Services\PaymentGateways\PaymentGatewayFactory;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Modules\Payment\Services\PaymentGateways\Paypal\Paypal;

class CheckoutController extends Controller
{
    public function index()
    {
        return view("checkout",[
            'methods' => PaymentMethod::get()
        ]);
    }
    public function store(Request $request){
        $request->validate([ 
            'payment_method'=> 'required|exists:payment_methods,slug',
        ]);
        $data = $request->all();
        $gateway = PaymentGatewayFactory::create($data['payment_method']);  
        // $gateway = new Paypal();  
        $order = Order::create([
            'total'=>100
        ]);
        $user = Auth::user();
        return $gateway->create($order, $user);//meth create in class this gw
    }
    public function callback(Request $request, $slug)
    {
        $gateway = PaymentGatewayFactory::create($slug);    
        return $gateway->verify($request->id);  
    }
    public function cancel(Request $request, $slug)
    {
         
    }
}
