<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CommentStoreRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
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
        $rules = $this->rules;

        $rules['picture'] = 'required';
        $rules['figure'] = 'required';
        $rules['attitude'] = 'required';
        $rules['fee'] = 'required';

        return $rules;
    }

    public function messages()
    {
        return [
            'picture.required'=>'請評分圖片真實性', 
            'figure.required'=>'請評分身材評分', 
            'attitude.required'=>'請評分工作態度', 
            'fee.required'=>'請評分合理收費',        
        ];
    }
}
