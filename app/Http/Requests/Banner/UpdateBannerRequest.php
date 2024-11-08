<?php

namespace App\Http\Requests\Banner;

use Illuminate\Foundation\Http\FormRequest;
 
use Illuminate\Validation\Rule;
  

/**
 * Class UpdateBannerRequest.
 */
class UpdateBannerRequest extends FormRequest
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
            'description' => [Rule::unique('banners')->ignore($this->id),'max:1000'],
            'title' => [Rule::unique('banners')->ignore($this->id)],
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
