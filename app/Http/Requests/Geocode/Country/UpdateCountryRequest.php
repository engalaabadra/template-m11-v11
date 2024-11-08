<?php

namespace App\Http\Requests\Geocode\Country;

use Illuminate\Foundation\Http\FormRequest;
  
use Illuminate\Validation\Rule;
use Illuminate\Auth\Access\AuthorizationException;

/**
 * Class UpdateCountryRequest.
 */
class UpdateCountryRequest extends FormRequest
{

    /**
     * Determine if the Country is authorized to make this request.
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
                    'name' => ['required','max:225',Rule::unique('countries')->ignore($this->id)],
                    'code' => ['required', 'max:100'],
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
            'code.required'=>trans('The code field is required.'),
            'code.max:100'=>trans('The code must not be greater than 100.'),
            'active.in:1,0'=>trans('The selected active is invalid.')
      
        ];
    }
     
 
}
