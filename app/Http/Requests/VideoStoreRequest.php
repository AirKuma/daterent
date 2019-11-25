<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class VideoStoreRequest extends Request
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

        $rules['video'] = 'required';
        $rules['describe'] = 'max:150';

        return $rules;
    }

    public function messages()
    {
        return [
            'video.required'=>'請輸入Youtube連結',
            'describe.max'=>'影片描述不能超過150個字',          
        ];
    }
}
