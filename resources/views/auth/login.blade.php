@extends('layouts.app')

@section('title', '用户登录')

@section('content')
    <h2>用户登录</h2>
    <form method="POST" action="/login">
        @csrf
        <div>
            <label>用户名：</label>
            <input type="text" name="username" value="{{ old('username') }}" required>
        </div>
        <div>
            <label>密码：</label>
            <input type="password" name="password" required>
        </div>
        <div>
            <label>
                <input type="checkbox" name="remember"> 记住我
            </label>
        </div>
        <div>
            <button type="submit">登录</button>
        </div>
    </form>
    <p>没有账号？<a href="/register">立即注册</a></p>
@endsection
