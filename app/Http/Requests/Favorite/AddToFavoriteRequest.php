<?php

namespace App\Http\Requests\Favorite;

use Illuminate\Foundation\Http\FormRequest;
 
use Illuminate\Validation\Rule;


class AddToFavoriteRequest extends FormRequest
{
     

    /**
     * Determine if the Favorite is authorized to make this request.
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
            'post_id' => ['numeric','exists:posts,id','required'],
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
