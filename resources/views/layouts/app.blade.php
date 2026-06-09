<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', '用户认证系统')</title>
    <link rel="stylesheet" href="{{ asset('dhtmlx/dhtmlx.css') }}">
    <style>
        body { margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, sans-serif; background: #f4f4f4; }
        .dhx-navbar { background: #28344e; color: #fff; padding: 0 20px; display: flex; align-items: center; height: 50px; box-shadow: 0 2px 4px rgba(0,0,0,0.15); }
        .dhx-navbar h3 { margin: 0; font-size: 16px; }
        .dhx-navbar .nav-links { margin-left: auto; display: flex; align-items: center; gap: 10px; }
        .dhx-navbar .nav-links a, .dhx-navbar .nav-links form button { color: #fff; text-decoration: none; padding: 6px 14px; border-radius: 4px; font-size: 13px; border: none; background: transparent; cursor: pointer; }
        .dhx-navbar .nav-links a:hover, .dhx-navbar .nav-links form button:hover { background: rgba(255,255,255,0.15); }
        .dhx-navbar .nav-links .username { color: #a0b4d6; font-size: 13px; }
        .dhx-navbar .nav-links img.avatar { width: 28px; height: 28px; border-radius: 50%; vertical-align: middle; }
        .page-content { max-width: 800px; margin: 30px auto; padding: 25px; background: #fff; border-radius: 6px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
        .page-content h2 { margin-top: 0; color: #333; font-size: 20px; padding-bottom: 12px; border-bottom: 2px solid #eee; }
        .form-row { margin-bottom: 14px; }
        .form-row label { display: inline-block; width: 100px; font-weight: 600; color: #555; font-size: 13px; }
        .form-row input { padding: 8px 12px; border: 1px solid #ddd; border-radius: 4px; width: 260px; font-size: 13px; }
        .form-row input:focus { border-color: #2196F3; outline: none; box-shadow: 0 0 4px rgba(33,150,243,0.2); }
        .success-msg { background: #d4edda; color: #155724; padding: 12px 16px; border-radius: 4px; margin: 20px auto; max-width: 800px; }
        .error-msg { background: #f8d7da; color: #721c24; padding: 12px 16px; border-radius: 4px; margin: 20px auto; max-width: 800px; }
        .error-msg ul { margin: 0; padding-left: 20px; }
        table { border-collapse: collapse; width: 100%; }
        table th { background: #f8f9fa; text-align: left; color: #555; }
        table th, table td { padding: 10px 15px; border: 1px solid #dee2e6; font-size: 13px; }
        .avatar-box { width: 100px; height: 100px; border-radius: 50%; border: 2px dashed #ccc; display: flex; align-items: center; justify-content: center; color: #999; background: #fafafa; overflow: hidden; }
        .avatar-box img { width: 100%; height: 100%; object-fit: cover; }
        .dhx-btn { display: inline-block; padding: 8px 20px; border: none; border-radius: 4px; font-size: 13px; cursor: pointer; text-decoration: none; }
        .dhx-btn-primary { background: #2196F3; color: #fff; }
        .dhx-btn-primary:hover { background: #1976D2; }
        .dhx-btn-outline { background: transparent; color: #2196F3; border: 1px solid #2196F3; }
        .dhx-btn-outline:hover { background: #e3f2fd; }
        .dhx-btn-danger { background: transparent; color: #e53935; border: none; cursor: pointer; font-size: 13px; padding: 6px 14px; }
        .dhx-btn-danger:hover { background: rgba(229,57,53,0.1); border-radius: 4px; }
    </style>
</head>
<body>
    <div class="dhx-navbar">
        <h3>用户认证系统</h3>
        <div class="nav-links">
            @auth
                @if (Auth::user()->avatar)
                    <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="avatar">
                @endif
                <span class="username">欢迎，{{ Auth::user()->username }}！</span>
                <a href="/home">主页</a>
                <a href="/profile">个人中心</a>
                <form method="POST" action="/logout" style="display:inline">@csrf
                    <button type="submit" class="dhx-btn-danger">退出登录</button>
                </form>
            @else
                <a href="/login">登录</a>
                <a href="/register">注册</a>
            @endauth
        </div>
    </div>

    @if (session('success'))
        <div class="success-msg">{{ session('success') }}</div>
    @endif
    @if ($errors->any())
        <div class="error-msg"><ul>@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
    @endif

    <main>
        @yield('content')
    </main>
</body>
</html>
