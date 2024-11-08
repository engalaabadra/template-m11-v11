<?php

namespace Modules\Wallet\Resources\User;

 
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Movement\Traits\MovementTrait;

class WalletResource extends JsonResource
{
    use  MovementTrait;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'id'   => $this->id,
            'user'=> $this->user ? $this->user : null,
            'balance'      => $this->balance     ,
            'count_movements'=>Movement::where('wallet_id',$this->id)->count(),

        ];
    }
}
