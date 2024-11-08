<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;
 
use Illuminate\Validation\Rule;


class StoreContactRequest extends FormRequest
{
     

    /**
     * Determine if the Contact is authorized to make this request.
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
            'name' => ['required'],
            // 'phone_no' => ['required'],
            'email' => ['required','email'],
            'message' => ['required','max:2000']
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
