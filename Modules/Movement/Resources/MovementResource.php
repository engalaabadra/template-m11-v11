<?php

namespace Modules\Movement\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;
 
class MovementResource extends JsonResource
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
            'wallet_id'=> $this->wallet ? $this->wallet->id : null,
            'name'      => $this->name,
            'original_value'      => $this->original_value,
            'balance_before'      => $this->balance_before,
            'balance_after'      => $this->balance_after,
            'type'      => $this->type,
            'original_type'      => $this->original_type,
            'time'=>now()

        ];
    }
}
