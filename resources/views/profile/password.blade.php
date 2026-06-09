@extends('layouts.app')

@section('title', '修改密码')

@section('content')
    <h2>修改密码</h2>
    <form method="POST" action="/profile/password">
        @csrf
        @method('PUT')
        <div>
            <label>原密码：</label>
            <input type="password" name="current_password" required>
        </div>
        <div>
            <label>新密码：</label>
            <input type="password" name="new_password" required minlength="6">
        </div>
        <div>
            <label>确认新密码：</label>
            <input type="password" name="new_password_confirmation" required minlength="6">
        </div>
        <div>
            <button type="submit">修改密码</button>
        </div>
    </form>
    <p><a href="/profile">返回个人中心</a></p>
@endsection
