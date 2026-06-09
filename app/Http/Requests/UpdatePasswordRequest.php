<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'current_password' => 'required|current_password',
            'new_password' => 'required|string|min:6|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'current_password.required' => '请输入原密码',
            'current_password.current_password' => '原密码不正确',
            'new_password.required' => '请输入新密码',
            'new_password.min' => '新密码至少6个字符',
            'new_password.confirmed' => '两次新密码输入不一致',
        ];
    }
}
