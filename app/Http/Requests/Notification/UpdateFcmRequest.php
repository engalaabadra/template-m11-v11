<?php

namespace App\Http\Requests\Notification;

use Illuminate\Foundation\Http\FormRequest;
 
use Illuminate\Validation\Rule;


class UpdateFcmRequest extends FormRequest
{
     

    /**
     * Determine if the Chat is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fcm_token' => ['required'],
        ];
    }

    /**
     * @return array
    */
    public function messages()
    {
        return [
        
        ];
    }
}
