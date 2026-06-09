@extends('layouts.app')

@section('title', '个人中心')

@section('content')
<div class="page-content">
    <h2>个人中心</h2>

    {{-- 头像 --}}
    <div style="margin-bottom:15px;">
        @if (Auth::user()->avatar)
            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="头像" width="100" height="100" style="border-radius:50%;border:3px solid #eee;">
        @else
            <div style="width:100px;height:100px;border-radius:50%;border:2px dashed #ccc;display:flex;align-items:center;justify-content:center;color:#999;background:#fafafa;">无头像</div>
        @endif
        <br><br>
        <form method="POST" action="{{ route('profile.avatar') }}" enctype="multipart/form-data" style="display:flex;align-items:center;gap:10px;">
            @csrf
            <input type="file" name="avatar" accept="image/jpeg,image/png,image/jpg,image/gif" required>
            <button type="submit" class="dhx-btn dhx-btn-primary">上传头像</button>
        </form>
    </div>

    <table>
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
    <a href="/profile/edit" class="dhx_button dhx_button--outlined dhx_button--primary" style="text-decoration:none;">修改信息</a>
    &nbsp;
    <a href="/profile/password" class="dhx_button dhx_button--outlined dhx_button--primary" style="text-decoration:none;">修改密码</a>
</div>
@endsection
