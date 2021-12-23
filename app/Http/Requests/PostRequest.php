<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            "title" => "required | max:20 | min:6",
            "content" => "required",
            "user_id" => "required | numeric",
        ];
    }

    public function messages()
    {
        return [
            "title.required" => "Tên không được để trống",
            "title.min" => "Tên cần tối thiểu 6 kí tự",
            "title.max" => "Tên cần tối đa 20 kí tự",
            "content.required" => "Mô tả không được để trống"
        ];
    }
}
