<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateidentifiedReques extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'                  => 'required',
            'identified_cate_id'    => 'required',
            'identified_cate_id'    => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required'                 => 'Vui lòng tên đối tượng nhận diện',
            'identified_cate_id.required'   => 'Vui lòng chọn loại nhận diện',
            'identified_type_id.required'   => 'Vui lòng chọn loại cảnh báo',
        ];
    }
}
