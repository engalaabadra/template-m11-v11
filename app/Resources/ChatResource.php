<?php

namespace App\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChatResource extends JsonResource
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
            'body'      => $this->body,
            'user'      => $this->user ? $this->user :null,
            'client'      => $this->client ? $this->client :null,
            'sender_id'      => $this->sender_id,
            'recipient_id'      => $this->recipient_id,
            'files'      => $this->files,
            'time'=>$this->created_at
            
        ];
    }
}
