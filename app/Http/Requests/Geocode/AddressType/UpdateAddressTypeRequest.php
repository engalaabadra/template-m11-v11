<?php

namespace App\Http\Requests\Geocode\AddressType;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Auth\Access\AuthorizationException;

/**
 * Class UpdateAddressTypeRequest.
 */
class UpdateAddressTypeRequest extends FormRequest
{
    
    /**
     * Determine if the AddressType is authorized to make this request.
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
                'name' => ['required','max:100'],
                'description' => ['max:1000'],
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
            'name.required'=>trans('The name field is required.'),
            'name.max:225'=>trans('The name must not be greater than 225.'),
            'description.max:1000'=>trans('The description must not be greater than 1000.'),
            'active.in:1,0'=>trans('The selected active is invalid.')
        ];
    }
     

 
}
