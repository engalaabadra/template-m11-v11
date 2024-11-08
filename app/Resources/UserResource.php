<?php

namespace App\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

class UserResource extends JsonResource
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
            'full_name'      => $this->full_name,
            'nick_name'      => $this->nick_name,
            'phone_no'      => $this->phone_no,
            "bio" => $this->profile ? $this->profile->bio :null,
            "original_gender" => $this->profile ? $this->profile->original_gender :null,
            "gender" => $this->profile ? intval($this->profile->gender ):null,
            "birth_date" => $this->profile ? $this->profile->birth_date :null,
            "country" => $this->country,
            'fcm_token'      => $this->fcm_token,
            'email'      => $this->email,
            'email_verified_at'      => $this->email_verified_at,
            'original_active'      => $this->original_active,
            'active'      => $this->active,
            'created_at'      => $this->created_at,
            'image'      => $this->image
        ];
    }
}
