<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MessageStoreRequest extends Request
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

        $rules['content'] = 'required|max:255';

        return $rules;
    }

   public function messages()
    {
        return [
            'content.required'=>'請輸入內容',
            'content.max'=>'內容不能超過255個字',         
        ];
    }
}
