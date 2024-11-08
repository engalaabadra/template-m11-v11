<?php

namespace App\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
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
            'name'      => $this->name,
            'phone_no'      => $this->phone_no,
            'email'      => $this->email,
            'message'         => $this->message,
            'created_at'         => $this->created_at,
        ];
    }
}
