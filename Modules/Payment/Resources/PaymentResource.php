<?php

namespace Modules\Payment\Resources;

 
use Illuminate\Http\Resources\Json\JsonResource;


class PaymentResource extends JsonResource
{
     
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

            return [
                'id'            => $this->id,
                'payment_method'=> PaymentMethodResource::make($this->paymentMethod),     
                'payer_type'      => $this->payer_type,
                'payer_id'      => $this->payer_id,
                'payment_type'      => $this->payment_type,
                'payment_id'      => $this->payment_id,
                'amount'      => $this->amount,
                'currency_code'         => $this->currency_code,
                'type'         => $this->type,
                'status'         => $this->status,
                'transaction_id'         => $this->transaction_id,
                'payment_response'         => $this->payment_response,
            ];
        }
}
