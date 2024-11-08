<?php

namespace Modules\Wallet\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
 
use Illuminate\Validation\Rule;


class AddIntoWalletRequest extends FormRequest
{
     

    /**
     * Determine if the Wallet is authorized to make this request.
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
            'amount' => ['numeric','required']
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
