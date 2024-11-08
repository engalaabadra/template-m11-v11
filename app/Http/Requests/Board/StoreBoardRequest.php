<?php

namespace App\Http\Requests\Board;

use Illuminate\Foundation\Http\FormRequest;
 
use Illuminate\Validation\Rule;


class StoreBoardRequest extends FormRequest
{

    /**
     * Determine if the Board is authorized to make this request.
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
            'description' => ['required',Rule::unique('boards'),'max:1000'],
            'file'=>['mimes:jpeg,bmp,png,gif, svg'],
            'active' => ['sometimes',  'in:1,0'],
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
