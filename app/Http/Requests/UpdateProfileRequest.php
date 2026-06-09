<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $userId = Auth::id();

        return [
            'username' => ['required', 'string', 'max:50', Rule::unique('users', 'username')->ignore($userId)],
            'email' => ['required', 'email', 'max:100', Rule::unique('users', 'email')->ignore($userId)],
            'phone' => 'nullable|string|regex:/^1[3-9]\d{9}$/',
        ];
    }

    public function messages(): array
    {
        return [
            'username.required' => '请输入用户名',
            'username.unique' => '该用户名已被占用',
            'username.max' => '用户名最多50个字符',
            'email.required' => '请输入邮箱',
            'email.email' => '请输入有效的邮箱地址',
            'email.unique' => '该邮箱已被占用',
            'phone.regex' => '请输入有效的手机号（11位）',
        ];
    }
}
