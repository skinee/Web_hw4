@extends('layouts.app')

@section('title', '用户注册')

@section('content')
<div class="page-content">
    <h2>用户注册</h2>
    <form method="POST" action="/register">
        @csrf
        <div style="margin-bottom:12px;">
            <label>用户名：</label>
            <input type="text" name="username" value="{{ old('username') }}" required maxlength="50" placeholder="请输入用户名">
        </div>
        <div style="margin-bottom:12px;">
            <label>邮箱：</label>
            <input type="email" name="email" value="{{ old('email') }}" required maxlength="100" placeholder="请输入邮箱">
        </div>
        <div style="margin-bottom:12px;">
            <label>手机号：</label>
            <input type="text" name="phone" value="{{ old('phone') }}" placeholder="11位手机号">
        </div>
        <div style="margin-bottom:12px;">
            <label>密码：</label>
            <input type="password" name="password" required minlength="6" placeholder="至少6位">
        </div>
        <div style="margin-bottom:12px;">
            <label>确认密码：</label>
            <input type="password" name="password_confirmation" required minlength="6" placeholder="再次输入密码">
        </div>
        <div>
            <label></label>
            <button type="submit" class="dhx-btn dhx-btn-primary">注册</button>
        </div>
    </form>
    <p style="margin-top:15px;">已有账号？<a href="/login">立即登录</a></p>
</div>
@endsection
