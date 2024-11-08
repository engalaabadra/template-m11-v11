<?php

namespace App\Http\Requests\Geocode\City;


use Illuminate\Foundation\Http\FormRequest;
  
 

/**
 * Class StoreCityRequest.
 */
class StoreCityRequest extends FormRequest
{

     

    /**
     * Determine if the City is authorized to make this request.
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
            'name' => 'required|unique:cities|max:100',
            'code' => ['required', 'max:100'],
            'country_id' => ['required','numeric','exists:countries,id'],

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
            'country_id.required'=>trans('The country_id field is required.'),
            'country_id.numeric'=>trans('The country_id field must be a number.'),
            'country_id.exists'=>trans('The selected country_id is invalid.'),
            'active.in:1,0'=>trans('The selected active is invalid.')

        ];
    }
         
}
