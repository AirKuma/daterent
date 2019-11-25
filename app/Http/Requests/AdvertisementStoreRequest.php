<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdvertisementStoreRequest extends Request
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

        $rules['advertiser'] = 'required|max:150';
        $rules['imageurl'] = 'required|image';
        $rules['navigateurl'] = 'required|url';
        $rules['describe'] = 'max:150';

        if($this->has_img == '1'){
            $rules['imageurl'] = 'image';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'advertiser.required'=>'請輸入廣告商',
            'advertiser.max'=>'廣告商不能超過50個字',
            'imageurl.required'=>'請上傳廣告圖片',
            'imageurl.image'=>'檔案格式須為圖片格式',
            'navigateurl.required'=>'請輸入廣告連結',
            'navigateurl.url'=>'請輸入符合URL格式的廣告連結',
            'describe.max'=>'廣告描述不能超過150個字',          
        ];
    }
}
