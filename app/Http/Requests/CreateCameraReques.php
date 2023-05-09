<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCameraReques extends FormRequest
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
            'name'              => 'required',
            'name_area'         => 'required',
            'nvr_id'            => 'required',
            'link'              => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required'         => 'Vui lòng nhập tên Camera',
            'name_area.required'    => 'Vui lòng nhập vị trí đặt camera',
            'nvr_id.required'       => 'Vui lòng chọn NVR',
            'link.required'         => 'Vui lòng nhập link xem trực tiếp',
        ];
    }
}
