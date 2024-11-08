<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
 
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class LoginRequest extends FormRequest
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
            'email' => 'required_without:phone_no|email|exists:users,email',
            'country_id' => [
                'required_with:phone_no', 
                'numeric',
                // Custom validation to check if the country_id belongs to the phone_no
                Rule::exists('users', 'country_id')->where(function ($query) {
                    $query->where('phone_no', request('phone_no'));
                }),
            ],
            'phone_no' => 'required_without:email|numeric|regex:/^\d+$/|digits_between:7,14|exists:users,phone_no',
            'password'=>['required'],
            'fcm_token'=>['sometimes'],
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
