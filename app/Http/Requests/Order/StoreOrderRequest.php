<?php

namespace App\Http\Requests\Order;

 
use Illuminate\Foundation\Http\FormRequest;



class StoreOrderRequest extends FormRequest
{
     

    /**
     * Determine if the Order is authorized to make this request.
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
            //info order  & payment method
            'payment_method' => ['required','exists:payment_methods,slug']
            
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
