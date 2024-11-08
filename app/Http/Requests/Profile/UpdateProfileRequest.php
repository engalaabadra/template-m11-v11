<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

use Illuminate\Validation\Rules;

/**
 * Class UpdateProfileRequest.
 */
class UpdateProfileRequest extends FormRequest
{
    /**
     * StoreUserRequest constructor.
     */

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
        $userId=auth()->guard('api')->user()->id;
        return [
            'phone_no' => ['sometimes','numeric','regex:/^\d+$/','digits_between:7,14',Rule::unique('users')->ignore($userId)],
            'email' => ['sometimes','max:255',Rule::unique('users')->ignore($userId)],
            'country_id' => [
                'required_with:phone_no', 
                'numeric',
                // Custom validation to check if the country_id belongs to the phone_no
                Rule::exists('users', 'country_id')->where(function ($query) {
                    $query->where('phone_no', request('phone_no'));
                }),
            ],
            'full_name' => ['sometimes','min:3','max:255'],
            'nick_name' => ['nullable','min:3','max:255'],
            'bio' => ['nullable'],
            'gender' => ['nullable','in:1,0'],
            'birth_date' => ['date_format:d-m-Y','before:today'],
            'file'=>['mimes:jpeg,bmp,png,gif,svg']
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
