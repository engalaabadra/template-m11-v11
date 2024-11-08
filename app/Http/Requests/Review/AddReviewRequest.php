<?php

namespace App\Http\Requests\Review;

use Illuminate\Foundation\Http\FormRequest;
 
use Illuminate\Validation\Rule;


class AddReviewRequest extends FormRequest
{

    /**
     * Determine if the Review is authorized to make this request.
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
            // 'reservation_id' => ['numeric','exists:reservations,id','required'],
            'description'=>['nullable'],
            'rating'=>['required','numeric'],
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
