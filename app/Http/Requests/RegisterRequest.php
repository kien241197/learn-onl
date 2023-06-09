<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', Rule::unique('users')],
            'name' => ['required'],
            'phone' => ['required', 'regex:/[0-9]/'],
            'company' => ['required'],
            'address' => ['required'],
            'password' => ['required','regex:/[A-Za-z]/', 'regex:/[0-9]/', 'min:6', 'confirmed'],
        ];
    }

    /**
     * customize msg error
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'Nhập Email',
            'email.unique' => 'Email đã được sử dụng',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Nhập mật khẩu',
            'password.regex' => 'Mật khẩu bao gồm chữ và số',
            'password.min' => 'Mật khẩu tối thiểu 6 ký tự',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp',
            'name.required' => 'Nhập tên',
            'phone.required' => 'Nhập SĐT',
            'phone.regex' => 'Số điện thoại không đúng định dạng',
            'company.required' => 'Nhập đơn vị công tác',
            'address.required' => 'Nhập địa chỉ',
        ];
    }
}