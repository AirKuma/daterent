<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PictureStoreRequest extends Request
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

        $rules['picture'] = 'required|image';
        $rules['describe'] = 'max:150';

        if($this->has_img == '1'){
            $rules['picture'] = 'image';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'picture.required'=>'請上傳圖片',
            'picture.image'=>'檔案格式須為圖片格式',
            'describe.max'=>'圖片描述不能超過150個字',          
        ];
    }
}