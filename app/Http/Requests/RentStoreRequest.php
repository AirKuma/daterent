<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RentStoreRequest extends Request
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

        $rules['fee'] = 'required|integer';
        $rules['phone'] = 'required|min:8|max:20';
        $rules['facebook'] = 'required|url';
        $rules['youtube'] = 'required|url';
        $rules['web'] = 'url';

        $rules['requestgender'] = 'required';
        $rules['serviceaddress'] = 'required|max:150';
        $rules['servicetime'] = 'required|max:150';
        $rules['language'] = 'required|max:150';
        $rules['bust'] = 'required|max:100|integer';
        $rules['waistline'] = 'required|max:100|integer';
        $rules['hips'] = 'required|max:100|integer';
        $rules['motto'] = 'max:50';

        return $rules;
    }

   public function messages()
    {
        return [
            'fee.required'=>'請輸入收費',
            'fee.integer'=>'收費必須是數字',
            'phone.required'=>'請輸入連絡電話',
            'phone.max'=>'連絡電話不能超過20個字',
            'phone.min'=>'連絡電話不能少於8個字',
            'facebook.required'=>'請輸入facebook連結',
            'facebook.url'=>'請輸入符合URL格式的facebook連結',
            'youtube.required'=>'請輸入youtube連結',
            'youtube.url'=>'請輸入符合URL格式的youtube連結',
            'web.url'=>'請輸入符合URL格式的個人網站連結',
            'requestgender.required'=>'請選擇出租要求性別',
            'serviceaddress.required'=>'請輸入服務地址',
            'serviceaddress.max'=>'服務地址不能超過150個字',
            'servicetime.required'=>'請輸入服務時間',
            'servicetime.max'=>'服務時間不能超過150個字',
            'language.required'=>'請輸入使用語言',
            'language.max'=>'使用語言不能超過150個字',
            'bust.required'=>'請輸入胸圍',
            'bust.max'=>'胸圍不能超過100',
            'bust.integer'=>'胸圍必須是數字',
            'waistline.required'=>'請輸入腰圍',
            'waistline.max'=>'腰圍不能超過100',
            'waistline.integer'=>'腰圍必須是數字',
            'hips.required'=>'請輸入臀圍',
            'hips.max'=>'臀圍不能超過100',
            'hips.integer'=>'臀圍必須是數字',
            'motto.max'=>'座右銘不能超過50個字',
            
        ];
    }
}
