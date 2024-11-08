<?php

namespace Modules\RequestWithdrawing\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;
use Modules\Wallet\Resources\User\WalletResource;
class RequestWithdrawingResource extends JsonResource
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
            'id'   => $this->id,
            'wallet'=> WalletResource::make($this->wallet),
            'amount'      => $this->amount,
            'status'      => $this->status,
            'original_status'      => $this->original_status,
            'created_at'      => $this->created_at,
            'updated_at'      => $this->updated_at,
        ];
    }
}
