<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'username' => 'required|string|max:50|unique:users,username',
            'email' => 'required|email|max:100|unique:users,email',
            'phone' => 'nullable|string|regex:/^1[3-9]\d{9}$/',
            'password' => 'required|string|min:6|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'username.required' => '请输入用户名',
            'username.unique' => '该用户名已被注册',
            'username.max' => '用户名最多50个字符',
            'email.required' => '请输入邮箱',
            'email.email' => '请输入有效的邮箱地址',
            'email.unique' => '该邮箱已被注册',
            'phone.regex' => '请输入有效的手机号（11位）',
            'password.required' => '请输入密码',
            'password.min' => '密码至少6个字符',
            'password.confirmed' => '两次密码输入不一致',
        ];
    }
}
