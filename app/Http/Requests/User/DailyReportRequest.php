<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class DailyReportRequest extends FormRequest
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
        return [
            'title' => 'required|string|max:30',
            'content' => 'required|string|max:1000',
            'reporting_time' => 'required|date_format:Y-m-d',
        ];
    }

    public function messages()
    {
        return [
            'tag_category_id.required' => '日付を入力してください',
            'reporting_time.required' => '入力必須の項目です',
            'title.required' => '入力必須の項目です',
            'title.max' => '30文字以内で入力してください',
            'content.required' => '入力必須の項目です',
            'content.max' => '1000文字以内で入力してください',
        ];
    }
}