@extends('layouts.app')

@section('title', '主页')

@section('content')
    <h2>欢迎你，{{ Auth::user()->username }}！登录成功</h2>
    <p>这是系统主页，功能可扩展。</p>
    <br>
    <a href="https://ys.mihoyo.com/" target="_blank">
        <button>点我下载原神</button>
    </a>
    &nbsp;&nbsp;
    <a href="https://mc.kurogames.com/" target="_blank">
        <button>点我下载鸣潮</button>
    </a>
@endsection
