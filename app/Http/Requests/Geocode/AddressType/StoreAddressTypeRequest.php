<?php

namespace App\Http\Requests\Geocode\AddressType;

use Illuminate\Foundation\Http\FormRequest;
  
use App\Models\User;
 
use Illuminate\Validation\Rule;

/**
 * Class StoreAddressTypeRequest.
 */
class StoreAddressTypeRequest extends FormRequest
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
        return [
            'name' => ['required','max:100'],
            'slug' => ['required','max:100'],
            'description' => ['max:1000'],
            'active' => ['in:1,0']
        ];
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
