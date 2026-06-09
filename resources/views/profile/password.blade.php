@extends('layouts.app')

@section('title', '修改密码')

@section('content')
<div class="page-content">
    <h2>修改密码</h2>
    <form method="POST" action="/profile/password">
        @csrf
        @method('PUT')
        <div style="margin-bottom:12px;">
            <label>原密码：</label>
            <input type="password" name="current_password" required placeholder="请输入原密码">
        </div>
        <div style="margin-bottom:12px;">
            <label>新密码：</label>
            <input type="password" name="new_password" required minlength="6" placeholder="至少6位">
        </div>
        <div style="margin-bottom:12px;">
            <label>确认新密码：</label>
            <input type="password" name="new_password_confirmation" required minlength="6" placeholder="再次输入新密码">
        </div>
        <div>
            <label></label>
            <button type="submit" class="dhx-btn dhx-btn-primary">修改密码</button>
        </div>
    </form>
    <p style="margin-top:15px;"><a href="/profile">返回个人中心</a></p>
</div>
@endsection
