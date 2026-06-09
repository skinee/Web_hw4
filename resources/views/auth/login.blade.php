@extends('layouts.app')

@section('title', '用户登录')

@section('content')
<div class="page-content">
    <h2>用户登录</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div style="margin-bottom:12px;">
            <label>用户名：</label>
            <input type="text" name="username" value="{{ old('username') }}" required placeholder="请输入用户名">
        </div>
        <div style="margin-bottom:12px;">
            <label>密码：</label>
            <input type="password" name="password" required placeholder="请输入密码">
        </div>
        <div style="margin-bottom:12px;">
            <label></label>
            <label>
                <input type="checkbox" name="remember"> 记住我
            </label>
        </div>
        <div>
            <label></label>
            <button type="submit" class="dhx-btn dhx-btn-primary">登录</button>
        </div>
    </form>
    <p style="margin-top:15px;">没有账号？<a href="{{ route('register') }}">立即注册</a></p>
</div>
@endsection
