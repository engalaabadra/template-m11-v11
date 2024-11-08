<?php

namespace App\Resources\Geocode;

use Illuminate\Http\Resources\Json\JsonResource;

class StateResource extends JsonResource
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
            'city'      => $this->city?$this->city->name:null,
            'name'      => $this->name,
            'code'      => $this->code,
            'active'         => $this->active,
            'original_active'         => $this->original_active,
            'created_at'         => $this->created_at,
        ];
    }
}
