<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RequestStoreRequest extends Request
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

        $rules['title'] = 'required|max:80';
        $rules['gender'] = 'required';
        $rules['region'] = 'required|different:reg';
        $rules['reward'] = 'required|max:50';
        $rules['content'] = 'required|max:255';

        return $rules;
    }

    public function messages()
    {
        return [
            'title.required'=>'請輸入主題',
            'title.max'=>'主題不能超過80個字',
            'gender.required'=>'請選擇性別',
            'region.required'=>'請選擇地區',
            'region.different'=>'請選擇地區',
            'reward.required'=>'請輸入報酬',
            'reward.max'=>'報酬不能超過50個字',
            'content.required'=>'請輸入內容',
            'content.max'=>'內容不能超過255個字',
            
        ];
    }
}
