<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContactFormRequest extends Request
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
        if($this->activate == ''){
            return [
            'name' => 'required',
            'email' => 'required|email',
            'title' => 'required',
            'contents' => 'required',
          ];
       }else{
            return [
                'email' => 'required|email',
              ];
       }
    }

    public function messages()
    {
        return [
            'name.required'=>'請輸入姓名',
            'email.required' => '請輸入E-mail',
            'email.email' => '請輸入正確格式的E-mail',
            'title.required' => '請輸入標題',
            'contents.required' => '請輸入內容',
        ];
    }
}
