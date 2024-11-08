<?php

namespace Modules\Payment\Http\Controllers\WEB;

use Illuminate\Routing\Controller;

class PaymentMethodController extends Controller
{
    public function paymentProccessFinishing($price,$reservationId,$user){
        $reservation = Reservation::where('id',$reservationId)->first();
        if(!$reservation) return abort(404);
        $resultForm = view('payments.form')->with(compact('price','reservationId','user'));
        return $resultForm;
    }
}
