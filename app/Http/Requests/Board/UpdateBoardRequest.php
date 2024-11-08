<?php

namespace App\Http\Requests\Board;

use Illuminate\Foundation\Http\FormRequest;
 
use Illuminate\Validation\Rule;

/**
 * Class UpdateBoardRequest.
 */
class UpdateBoardRequest extends FormRequest
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
            'description' => ['max:1000',Rule::unique('boards')->ignore($this->id)],
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
