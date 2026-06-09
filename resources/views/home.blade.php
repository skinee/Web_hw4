@extends('layouts.app')

@section('title', '主页')

@section('content')
<div class="page-content">
    <h2>欢迎你，{{ Auth::user()->username }}！登录成功</h2>
    <p>这是系统主页，功能可扩展。</p>
    <br>
    <a href="https://ys.mihoyo.com/" target="_blank">
        <button class="dhx-btn dhx-btn-primary" style="padding:10px 24px;font-size:16px;">点我下载原神</button>
    </a>
    &nbsp;&nbsp;
    <a href="https://mc.kurogames.com/" target="_blank">
        <button class="dhx-btn dhx-btn-outline" style="padding:10px 24px;font-size:16px;">点我下载鸣潮</button>
    </a>
</div>
@endsection
