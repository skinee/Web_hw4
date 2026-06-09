@extends('layouts.app')

@section('title', '修改信息')

@section('content')
<div class="page-content">
    <h2>修改基础信息</h2>
    <form method="POST" action="{{ route('profile.edit') }}">
        @csrf
        @method('PUT')
        <div style="margin-bottom:12px;">
            <label>用户名：</label>
            <input type="text" name="username" value="{{ old('username', Auth::user()->username) }}" required maxlength="50">
        </div>
        <div style="margin-bottom:12px;">
            <label>邮箱：</label>
            <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" required maxlength="100">
        </div>
        <div style="margin-bottom:12px;">
            <label>手机号：</label>
            <input type="text" name="phone" value="{{ old('phone', Auth::user()->phone) }}" placeholder="11位手机号">
        </div>
        <div>
            <label></label>
            <button type="submit" class="dhx-btn dhx-btn-primary">保存修改</button>
        </div>
    </form>
    <p style="margin-top:15px;"><a href="{{ route('profile') }}">返回个人中心</a></p>
</div>
@endsection
