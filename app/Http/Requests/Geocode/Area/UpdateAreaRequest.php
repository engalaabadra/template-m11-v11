<?php

namespace App\Http\Requests\Geocode\Area;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Auth\Access\AuthorizationException;


/**
 * Class UpdateAreaRequest.
 */
class UpdateAreaRequest extends FormRequest
{
    
    /**
     * Determine if the Area is authorized to make this request.
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
        if($this->id=="1"){
                
            return throw new AuthorizationException(trans('You cannt make this action'));
        }else{
            return [
                'name' => ['required','max:100',Rule::unique('areas')->ignore($this->id)],
                'active' => ['in:1,0'],
                'state_id' => ['required','numeric','exists:states,id'],

            ];
        }
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [ 
            'name.required'=>trans('The name field is required.'),
            'name.max:225'=>trans('The name must not be greater than 225.'),
            'state_id.required'=>trans('The state_id field is required.'),
            'state_id.numeric'=>trans('The state_id field must be a number.'),
            'state_id.exists'=>trans('The selected state_id is invalid.'),
            'active.in:1,0'=>trans('The selected active is invalid.')

        ];
    }
     

 
}
