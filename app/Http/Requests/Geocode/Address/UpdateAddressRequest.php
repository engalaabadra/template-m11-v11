<?php

namespace App\Http\Requests\Geocode\Address;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Auth\Access\AuthorizationException;

/**
 * Class UpdateAddressRequest.
 */
class UpdateAddressRequest extends FormRequest
{

    
    /**
     * Determine if the Address is authorized to make this request.
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
        if($this->id=="1"){
                
            return throw new AuthorizationException(trans('You cannt make this action'));
        }else{
            return [
                'line_1' => ['required','max:100'],
                'line_2' => ['max:100'],
                'line_3' => ['max:100'],
                'zipcode' => ['max:100'],
                'country_id' => ['required','numeric','exists:countries,id'],
                'city_id' => ['required','numeric','exists:cities,id'],
                'state_id' => ['required','numeric','exists:states,id'],
                'area_id' => ['required','numeric','exists:areas,id'],
                'address_type_id' => ['required','numeric','exists:address_types,id'],
                'url' => ['max:100'],
                'longitute' => ['required','numeric'],
                'latitude' => ['required','numeric'],
                'owner_id' => ['required','numeric','exists:users,id'],
                'owner_type' => ['max:100'],
                'email' => ['required','max:225',Rule::unique('users'),'email'],
                'phone_number' => ['required','max:100'],
                'active' => ['in:1,0']

            ];
        }
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'line_1.required'=>trans('The line_1 field is required.'),
            'line_1.max:100'=>trans('The line_1 must not be greater than 100.'),
            'line_2.required'=>trans('The line_2 field is required.'),
            'line_2.max:100'=>trans('The line_2 must not be greater than 100.'),
            'line_3.required'=>trans('The line_3 field is required.'),
            'line_3.max:100'=>trans('The line_3 must not be greater than 100.'),
            'zipcode.max:100'=>trans('The zipcode must not be greater than 100.'),
            'country_id.required'=>trans('The country_id field is required.'),
            'country_id.numeric'=>trans('The country_id field must be a number.'),
            'country_id.exists'=>trans('The selected country_id is invalid.'),
            'city_id.required'=>trans('The city_id field is required.'),
            'city_id.numeric'=>trans('The city_id field must be a number.'),
            'city_id.exists'=>trans('The selected city_id is invalid.'),
            'state_id.required'=>trans('The state_id field is required.'),
            'state_id.numeric'=>trans('The state_id field must be a number.'),
            'state_id.exists'=>trans('The selected state_id is invalid.'),
            'area_id.required'=>trans('The area_id field is required.'),
            'area_id.numeric'=>trans('The area_id field must be a number.'),
            'area_id.exists'=>trans('The selected area_id is invalid.'),
            'address_type_id.required'=>trans('The address_type_id field is required.'),
            'address_type_id.numeric'=>trans('The address_type_id field must be a number.'),
            'address_type_id.exists'=>trans('The selected address_type_id is invalid.'),
            'url.max:100'=>trans('The url must not be greater than 100.'),
            'longitute.required'=>trans('The longitute field is required.'),
            'longitute.numeric'=>trans('The longitute field must be a number.'),
            'latitude.required'=>trans('The latitude field is required.'),
            'latitude.numeric'=>trans('The latitude field must be a number.'),
            'owner_id.numeric'=>trans('The owner_id field must be a number.'),
            'owner_id.exists'=>trans('The selected owner_id is invalid.'),
            'owner_type.max:100'=>trans('The owner_type must not be greater than 100.'),
            'email.required'=>trans('The email field is required.'),
            'email.unique'=>trans('The email has already been taken.'),
            'email.email'=>trans('The email must be a valid email address'),
            'phone_number.required'=>trans('The phone_number field is required.'),
            'active.in:1,0'=>trans('The selected active is invalid.')
            
        ];
    }
     
 
}
