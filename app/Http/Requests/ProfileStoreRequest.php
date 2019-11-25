<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;



class ProfileStoreRequest extends Request
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

        if($this->img == ''){
            $rules['name'] = 'required|max:8';
            $rules['birthday'] = 'required|date';
            $rules['height'] = 'required|min:70|max:300|integer';
            $rules['weight'] = 'required|min:20|max:1000|integer';
            $rules['nationality'] = 'required';
            $rules['city'] = 'required|different:reg';
            $rules['degree'] = 'required';
            $rules['careerclass'] = 'required';
            $rules['career'] = 'required|max:50';
            $rules['introduction'] = 'required|max:255';
            $rules['ideal'] = 'required|max:150';
        }
        else
            $rules['image'] = 'required|image';

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required'=>'請輸入暱稱',
            'name.max'=>'暱稱不能超過8個字',
            'birthday.required'=>'請輸入日期',
            'birthday.date'=>'日期格式不正確',
            'height.max'=>'身高不能超過3個字',
            'height.min'=>'身高不能少於70',
            'height.max'=>'身高不能超過300',
            'height.integer'=>'身高必須是數字',
            'weight.required'=>'請輸入體重',
            'weight.max'=>'體重不能超過3個字',
            'weight.min'=>'體重不能小於20',
            'weight.integer'=>'體重必須是數字',
            'nationality.required'=>'請輸入國籍',
            'city.required'=>'請輸入所在城市',
            'city.different'=>'請選擇所在城市',
            'degree.required'=>'請輸入學歷',
            'careerclass.required'=>'請選擇職業分類',
            'career.required'=>'請輸入職業',
            'career.max'=>'職業不能超過50個字',
            'introduction.required'=>'請輸入自我介紹',
            'introduction.max'=>'自我介紹不能超過255個字',
            'ideal.required'=>'請輸入理想對象',
            'ideal.max'=>'理想對象不能超過150個字',
            'image.required'=>'請選取圖片',
            'image.image'=>'檔案格式須為圖片格式',
            
        ];
    }
}
