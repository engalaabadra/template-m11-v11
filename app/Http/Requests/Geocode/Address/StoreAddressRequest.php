<?php

namespace App\Http\Requests\Geocode\Address;

use Illuminate\Foundation\Http\FormRequest;
  
use App\Models\User;
 
use Illuminate\Validation\Rule;

/**
 * Class StoreAddressRequest.
 */
class StoreAddressRequest extends FormRequest
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
            'email' => ['required','max:225','unique:users','email'],
            'phone_number' => ['required','max:100'],
            'active' => ['in:1,0']
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
