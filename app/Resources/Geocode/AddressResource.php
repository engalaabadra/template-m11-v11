<?php

namespace App\Resources\Geocode;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            'country'      => $this->country?$this->country->name:null,
            'city'      => $this->city?$this->city->name:null,
            'state'      => $this->state?$this->state->name:null,
            'area'      => $this->area?$this->area->name:null,
            'addressType'      => $this->addressType?$this->addressType->name:null,
            'line_1'      => $this->line_1,
            'line_2'      => $this->line_2,
            'line_3'      => $this->line_3,
            'name'      => $this->name,
            'zipcode'      => $this->zipcode,
            'url'      => $this->url,
            'longitute'      => $this->longitute,
            'latitude'      => $this->latitude,
            'owner'      => $this->owner?$this->owner->name:null,
            'ownerType'      => $this->ownerType?$this->ownerType->name:null,
            'email'      => $this->email,
            'phone_number'      => $this->phone_number,
            'active'         => $this->active,
            'original_active'         => $this->original_active,
            'created_at'         => $this->created_at,
        ];
    }
}
