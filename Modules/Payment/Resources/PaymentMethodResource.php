<?php

namespace Modules\Payment\Resources;

 
use Illuminate\Http\Resources\Json\JsonResource;

use Modules\Wallet\Entities\Wallet;

class PaymentMethodResource extends JsonResource
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
                'main_lang'      => $this->main_lang,
                'translate_id'      => $this->translate_id,
                'name'      => $this->name,
                'slug'      => $this->slug,
                'icon'         => $this->icon,
                'options'         => $this->options
            ];
        }
}
