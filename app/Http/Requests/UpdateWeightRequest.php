<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWeightRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'date' => ['required'],

            'weight' => [
                'required',
                'numeric',
                'regex:/^\d{1,4}(\.\d{1})?$/'
            ],

            'calorie' => ['required', 'numeric'],

            'exercise_time' => ['required'],

            'exercise_content' => ['required', 'max:120'],
        ];
    }

    public function messages(): array
    {
        return [
            // 日付
            'date.required' => '日付を入力してください',

            // 体重
            'weight.required' => '体重を入力してください',
            'weight.numeric' => '数字で入力してください',
            'weight.regex' => '小数点は1桁で入力してください',
            // digits_between は削除（ルールに存在しないため）

            // カロリー
            'calorie.required' => '摂取カロリーを入力してください',
            'calorie.numeric' => '数字で入力してください',

            // 運動時間
            'exercise_time.required' => '運動時間を入力してください',

            // 運動内容
            'exercise_content.required' => '運動内容を入力してください',
            'exercise_content.max' => '120文字以内で入力してください',
        ];
    }
}


