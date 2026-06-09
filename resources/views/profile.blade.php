@extends('layouts.app')

@section('title', '个人中心')

@section('content')
    <h2>个人中心</h2>

    {{-- 头像 --}}
    <div>
        @if (Auth::user()->avatar)
            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="头像" width="100" height="100">
        @else
            <div style="width:100px;height:100px;border:1px solid #ccc;display:flex;align-items:center;justify-content:center;color:#999;">无头像</div>
        @endif
        <br>
        <form method="POST" action="/profile/avatar" enctype="multipart/form-data">
            @csrf
            <input type="file" name="avatar" accept="image/jpeg,image/png,image/jpg,image/gif" required>
            <button type="submit">上传头像</button>
        </form>
    </div>
    <br>

    <table border="1" cellpadding="8">
        <tr>
            <th>UID</th>
            <td>{{ Auth::user()->uid }}</td>
        </tr>
        <tr>
            <th>用户名</th>
            <td>{{ Auth::user()->username }}</td>
        </tr>
        <tr>
            <th>邮箱</th>
            <td>{{ Auth::user()->email }}</td>
        </tr>
        <tr>
            <th>手机号</th>
            <td>{{ Auth::user()->phone ?? '未设置' }}</td>
        </tr>
        <tr>
            <th>最后登录时间</th>
            <td>{{ Auth::user()->last_login_at ? Auth::user()->last_login_at->format('Y-m-d H:i:s') : '首次登录' }}</td>
        </tr>
        <tr>
            <th>注册时间</th>
            <td>{{ Auth::user()->created_at->format('Y-m-d H:i:s') }}</td>
        </tr>
    </table>
    <br>
    <a href="/profile/edit">修改信息</a>
    &nbsp;|&nbsp;
    <a href="/profile/password">修改密码</a>
@endsection
