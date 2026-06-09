@extends('layouts.app')

@section('title', '用户注册')

@section('content')
    <h2>用户注册</h2>
    <form method="POST" action="/register">
        @csrf
        <div>
            <label>用户名：</label>
            <input type="text" name="username" value="{{ old('username') }}" required maxlength="50">
        </div>
        <div>
            <label>邮箱：</label>
            <input type="email" name="email" value="{{ old('email') }}" required maxlength="100">
        </div>
        <div>
            <label>手机号：</label>
            <input type="text" name="phone" value="{{ old('phone') }}" placeholder="11位手机号">
        </div>
        <div>
            <label>密码：</label>
            <input type="password" name="password" required minlength="6">
        </div>
        <div>
            <label>确认密码：</label>
            <input type="password" name="password_confirmation" required minlength="6">
        </div>
        <div>
            <button type="submit">注册</button>
        </div>
    </form>
    <p>已有账号？<a href="/login">立即登录</a></p>
@endsection
