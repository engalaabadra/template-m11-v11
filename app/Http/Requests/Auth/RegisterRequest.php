<?php

namespace App\Http\Requests\Auth;

use App\Services\General\ProccessCodesService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;
use App\Services\General\SendingMessagesService;
 
use Illuminate\Validation\Rule;

/**
 * Class RegisterRequest.
 */
class RegisterRequest extends FormRequest
{
     
    /**
     * Determine if the user is authorized to make this request.
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
            'email' => 'required_without:phone_no|email|unique:users',
            'country_id' => [
                'required_with:phone_no', 
                'numeric'
            ],
            'phone_no' => 'required_without:email|numeric|regex:/^\d+$/|digits_between:7,14|unique:users,phone_no',
            'password' => ['required', Rules\Password::defaults()],
            'fcm_token' => ['sometimes'],
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

