<?php

namespace App\Http\Requests\Geocode\State;

use Illuminate\Foundation\Http\FormRequest;
  
use App\Models\User;
 

/**
 * Class StoreStateRequest.
 */
class StoreStateRequest extends FormRequest
{
  
     

    /**
     * Determine if the State is authorized to make this request.
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
            'name' => 'required|unique:countries|max:100',
            'code' => ['required', 'max:100'],
            'city_id' => ['required','numeric','exists:cities,id'],

            'active' => ['required', 'in:1,0']
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
            'code.required'=>trans('The code field is required.'),
            'code.max:100'=>trans('The code must not be greater than 100.'),
            'city_id.required'=>trans('The city_id field is required.'),
            'city_id.numeric'=>trans('The city_id field must be a number.'),
            'city_id.exists'=>trans('The selected city_id is invalid.'),
            'active.in:1,0'=>trans('The selected active is invalid.')

        ];
    }
         
}
