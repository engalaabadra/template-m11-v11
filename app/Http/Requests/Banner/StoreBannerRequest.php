<?php

namespace App\Http\Requests\Banner;

use Illuminate\Foundation\Http\FormRequest;
 
use Illuminate\Validation\Rule;


class StoreBannerRequest extends FormRequest
{
     

    /**
     * Determine if the Banner is authorized to make this request.
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
            'description' => ['required','max:1000'],
            'title' => ['required',Rule::unique('banners')],
            'url' => ['sometimes'],
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
