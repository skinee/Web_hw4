<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', '用户认证系统')</title>
</head>
<body>
    {{-- 导航栏 --}}
    <nav>
        <h3>用户认证系统</h3>
        <div>
            @auth
                @if (Auth::user()->avatar)
                    <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="头像" width="30" height="30" style="border-radius:50%;vertical-align:middle;">
                @endif
                <span>欢迎，{{ Auth::user()->username }}！</span>
                <a href="/home">主页</a>
                <a href="/profile">个人中心</a>
                <form method="POST" action="/logout" style="display:inline">
                    @csrf
                    <button type="submit">退出登录</button>
                </form>
            @else
                <a href="/login">登录</a>
                <a href="/register">注册</a>
            @endauth
        </div>
    </nav>
    <hr>

    {{-- 提示消息 --}}
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- 主内容 --}}
    <main>
        @yield('content')
    </main>
</body>
</html>
