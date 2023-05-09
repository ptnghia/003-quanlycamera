<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateThanhvienReques extends FormRequest
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
            'email'             => 'required|email|unique:users,email',
            'username'         => 'required|unique:users,username',
            'password'          => 'required',
            'confirm-password'  => 'required|same:password',
            'roles'             => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required'                 => 'Vui lòng nhập tên người dùng',
            'email.required'                => 'Vui lòng nhập email',
            'email.email'                   => 'Định dạng email không đúng',
            'email.unique'                  => 'Email đã tồn tại',
            'username.required'             => 'Vui lòng nhập tên đăng nhập',
            'username.unique'               => 'Tên đăng nhập đã tồn tại',
            'password.required'             => 'Vui lòng nhập mật khẩu',
            'confirm-password.required'     => 'Vui lòng xác nhận mật khẩu',
            'confirm-password.same'         => 'Mật khẩu xác nhận không đúng',
            'password.roles'                => 'Vui lòng chọn phân quyền',
        ];
    }
}
