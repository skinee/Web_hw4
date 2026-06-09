@extends('layouts.app')

@section('title', '主页')

@section('content')
    <h2>欢迎你，{{ Auth::user()->username }}！登录成功</h2>
    <p>这是系统主页，功能可扩展。</p>
@endsection
