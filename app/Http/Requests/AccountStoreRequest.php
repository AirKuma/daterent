<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Hash;

class AccountStoreRequest extends Request
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
        $rules['current_password'] = 'required|max:60';
        $rules['newpassword'] = 'required|confirmed|max:60|min:6';
        $rules['newpassword_confirmation'] = 'required|different:current_password|max:60';

        if($this->admin == '1'){
            $rules['current_password'] = 'max:60';
            $rules['newpassword_confirmation'] = 'required|max:60';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'current_password.required'=>'請輸入密碼',
            'current_password.max'=>'密碼不能超過60位',
            'newpassword.required'=>'請輸入新密碼',
            'newpassword.confirmed'=>'兩次輸入的新密碼不一致',
            'newpassword.max'=>'新密碼不能超過60位',
            'newpassword.min'=>'新密碼不能少於6位',
            'newpassword_confirmation.required'=>'請輸入確認新密碼',
            'newpassword_confirmation.different'=>'新密碼不能和原密碼一樣',
            'newpassword_confirmation.max'=>'確認新密碼不能超過60位',
            
        ];
    }
}
