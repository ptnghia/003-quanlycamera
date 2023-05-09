<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'email'             => 'required|email',
            'username'          => 'required',
            'confirm_password'  => ['same:password'],
        ];
    }
    public function messages()
    {
        return [
            'name.required'         => 'Vui lòng nhập họ và tên',
            'email.required'        => 'Vui lòng nhập email',
            'email.email'           => 'Định dạng email không đúng',
            'username.required'     => 'Vui lòng nhập tên đăng nhập',
            'confirm_password.same' => 'Mật khẩu xác nhận không đúng'
            
        ];
    }
}
